<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $order->id }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.first_name')</td>
                    <td class="table-center">{{ $order->firstname }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.last_name')</td>
                    <td class="table-center">{{ $order->lastname }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.email')</td>
                    <td class="table-center">{{ $order->email }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.phone_number')</td>
                    <td class="table-center">{{ $order->phone }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Əlavə məlumat</td>
                    <td class="table-center">{{ $order->more_info }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Ödəniş üsulu</td>
                    <td class="table-center">{{ $order->paymentMethod->transname }}</td>
                </tr>


                {{-- @if($order->paymentMethod->id == 1)
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Kredit ayı</td>
                    <td class="table-center">{{ $order->creditMonth->month }} {{ __("frontend.details.months") }}</td>
                </tr>
                @elseif($order->paymentMethod->id == 2)
                    <tr class="bg-gray-100">
                        <td class="table-row-title w-25">Taksit kartı</td>
                        <td class="table-center">{{ $order->installmentCardMonth->installmentCard->transname }} </td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="table-row-title w-25">Taksit ayı</td>
                        <td class="table-center">{{ $order->installmentCardMonth->month }} {{ __("frontend.details.months") }}</td>
                    </tr>
                @endif --}}

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Çatdırılma üsulu</td>
                    <td class="table-center">{{ $order->deliveryMethod->transname }}</td>
                </tr>


                @if(!empty($order->district))
                    <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Şəhər</td>
                    <td class="table-center">{{ $order->district->transname ?? '' }}</td>
                </tr>
                @endif

                @if(!empty($order->address))
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Ünvan</td>
                    <td class="table-center">{{ $order->address }}</td>
                </tr>
                @endif

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.order_status')
                    </td>
                    <td class="table-center">
                        <span class="label label-lg label-inline label-light-success">
                         {{ $order->orderStatus->transname }}
                        </span>
                    </td>
                </tr>
            </tbody>

        </table>

        <h3 class="mt-2">Sifariş etdiyi </h3>
        <table class="table table-lg table-bordered table-striped  text-left" role="grid">
            <thead>
            <tr>
                <th>Nömrəsi</th>
                <th>Şəkili</th>
                <th>Adı</th>
                <th>Miqdarı</th>
                <th>Qiyməti</th>
                <th>Endirim</th>
                <th>Alt qiyməti</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $order_product)
            {{-- {{dd($order_product)}} --}}
                <tr>
                    <td>{{ $order_product->id }}</td>
                    <td>
                        <a target="_blank" href="{{ $order_product->product->adminUrl }}">
                            <img width="25" height="25" src="{{ $order_product->product->getFirstMediaUrl('product_images') ?: asset('backend/img/noimage.jpg') }}" alt="{{ $order_product['name']  }}">
                        </a>
                    </td>
                    <td>{{ $order_product->name ?? ''}}</td>
                    <td>{{ $order_product->quantity ?? '' }}</td>
                    <td>{{ $order_product->price ?? '' }} <span>&#8380;</span></td>
                    <td>{{ $order_product->discount_number ?? '' }} <span>&#8380;</span></td>
                    <td>{{ $order_product->subtotal_amount ?? '' }} <span>&#8380;</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="p-3 text-right">Ümumi qiymət: {{ $order['total_amount'] }} <span>&#8380;</span></h3>
        <hr>
    </div>
    <h3 class="my-2 text-center">Sifarişi dəyiş </h3>
    <br>
    <form class="form" action="{{ route('backend.orders.changeStatus', ['order' => $order->id]) }}">
        @csrf
        <div class="form-group">
            <div class="d-flex justify-content-center">
                <div class="col-4">
                    <label for="status_id" class="sr-only">Email</label>
                    <select id="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id">
                        <option value="">@lang('backend.placeholders.select.order_status')</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" @if(old('status_id', $order->order_status_id) == $status->id) selected @endif>
                                {{ $status->transname ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary mx-2">Dəyiş</button>
                </div>
            </div>
        </div>
    </form>
</div>
