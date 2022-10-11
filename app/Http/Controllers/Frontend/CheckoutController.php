<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\OrderType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CheckoutCartRequest;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Services\Components\CartService;
use App\Services\Payment\PaymentService;
use App\Services\PayriffService;
use Gloudemans\Shoppingcart\Facades\Cart as Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * @var CartService
     */
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function all()
    {
        $paymentMethods = Paymentmethod::active()->get();
        $deliveryMethods = DeliveryMethod::active()->orderBy('id', 'DESC')->get();
        $initial_price = 0;

        return view('frontend.pages.checkout', compact('paymentMethods', 'deliveryMethods', 'initial_price'));
    }

    /**
     * @param CheckoutCartRequest $request
     * @param PaymentService $paymentService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|void
     */

    public function inCart(CheckoutCartRequest $request, PayriffService $paymentGateway)
    {

        // dd(ipfind());
        $card_items = Basket::content()->flatten(1)->map(function ($item) {
            return [
                'rowId' => $item->rowId,
                'qty' => $item->qty,
                'product' => \App\Models\Product::find($item->id),
            ];
        });

        //Discount price
        if ($request->delivery_method_id == 1) {
            $total_price = $card_items->map(function ($item) {
                return  $item['product']->price * $item['qty'];
            })->sum();
            $endirim = $total_price / 10;
            $total_price -= $endirim;
        } else {
            $total_price = $card_items->map(function ($item) {
                return  $item['product']->price * $item['qty'];
            })->sum();
        }

        DB::beginTransaction();

        try {

            DB::commit();

            $order = Order::create([
                'total_amount' => $total_price,
                'more_info' => $request->more_info,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_method_id' => $request->payment_method_id,
                'order_status_id' => OrderType::PENDING,
                'ip_address' => ipfind(),
            ]);


            if (count($card_items) > 0) {
                foreach ($card_items as $item) {
                    $order->products()->create([
                        'product_id' => $item['product']['id'],
                        'name' => $item['product']['name'],
                        'quantity' => $item['qty'],
                        'price' => $item['product']->price,
                        'subtotal_amount' => $item['product']->price * $item['qty'],
                    ]);
                }
            };

            Basket::destroy();

            $order->load(['products', 'deliveryMethod', 'paymentMethod']);

            if ($order->payment_method_id == \App\Enums\PaymentType::PAY_ON_CARD) {

                $paymentPageUrl = $paymentGateway->createOrder(
                    $order['total_amount'],             // amount
                    $order['id'],    // description
                    'AZN',             // currency
                    'AZ',               // language
                    route('frontend.checkout.approved'),   // aprroveUrl
                    route('frontend.checkout.canceled'),   // cancelUrl
                    route('frontend.checkout.declined')   // declineUrl
                );
                DB::commit();

                $paymentUrl = $paymentPageUrl->paymentUrl;

                $order_id = $paymentPageUrl->orderId;
                $session_id = $paymentPageUrl->sessionId;

                $order->update([
                    'order_id' => $order_id,
                    'session_id' => $session_id,
                ]);
                return redirect($paymentUrl);
            }

            return view('frontend.payment.success');

        } catch (\Exception $e) {
            DB::rollback();
            info($e->getMessage());
            return view('frontend.payment.success');

        }
    }


    public function approved(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = json_decode(file_get_contents('php://input'), true);

            if (!empty($data['code']) && $data['code'] == '00000') {
                $order_id = $data['payload']['orderDescription'];
                $order = Order::findOrFail($order_id);
                $order->update(['order_status_id' => \App\Enums\OrderType::APPROVED]);
            }
        }

        return view('frontend.payment.success');
    }

    public function declined(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = json_decode(file_get_contents('php://input'), true);

            if (!empty($data['code']) && $data['code'] != '00000') {
                $order_id = $data['payload']['orderDescription'];
                $order = Order::findOrFail($order_id);
                $order->update(['order_status_id' => \App\Enums\OrderType::FAILED]);
            }
        }

        return view('frontend.payment.error');
    }

    public function canceled(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = json_decode(file_get_contents('php://input'), true);

            if (!empty($data['code']) && $data['code'] != '00000') {
                $order_id = $data['payload']['orderDescription'];
                $order = Order::findOrFail($order_id);
                $order->update(['order_status_id' => \App\Enums\OrderType::CANCELLED]);
            }
        }

        return view('frontend.payment.error');
    }

}
