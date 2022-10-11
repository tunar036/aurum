<?php

namespace App\Services\Payment;

use Illuminate\Support\Str;

class PaymentService
{
    // AlbalıKart
    /**
     * @param $model
     * @param $currency
     * @return void
     */

    public function sendPaymentRequest($model, $currency = 944):string
    {
        $mid = "bytelecom" . $model->installmentCardMonth->month;
        $key = "LG17CFVF6Q0D5MMH8O8WE5ID5MP5DSTO";
        $amount = $model->total_amount * 100;
        $reference = Str::random(16);
        $description = 'Tel:' . $model->user->phone . '-id:' . $model->id . '-month' . $model->installmentCardMonth->month;
        $language = locale();
        $signature = md5(strlen($mid) . $mid . strlen($amount) . $amount . strlen($currency) . $currency . (!empty($description) ? strlen($description) . $description : "0") . strlen($reference) . $reference . strlen($language) . $language . $key);
        $signature = strtoupper($signature);
        $url = 'https://pay.millikart.az/gateway/payment/register?mid=' . $mid . '&amount=' . $amount . '&currency=' . $currency . '&description=' . $description . '&reference=' . $reference . '&language=' . $language . '&signature=' . $signature . '&redirect=1';
        header("Location: $url");
    }

    // TamKart

    /**
     * @param $model
     * @return string
     */

    public function requestTamkart($model)
    {
        $payment = new AzeriCardApiService();

        return $payment->generate_azericard_form($model);

    }

    // Birkart

    /**
     * @param $order
     * @return void
     */

    public function requestBirkart($order)
    {
        $client_handler = "https://ecomm.pashabank.az:8463/ecomm2/ClientHandler";
        $payURL = "https://ecomm.pashabank.az:18443/ecomm2/MerchantHandler"; // pay URL
        $PublicCertFile = public_path('certificate/certificate.0018449.pem'); // Public Cert File
        $PrivateKeyFile = public_path('certificate/bytelecom_t.key'); // Private Key File
        $CAFile = public_path('frontend/web/certificate/PSroot.pem'); // CA File

        $data = [
            'command' => "V",
            'amount' => 100 * $order->total_amount,
            'taksit' => $order->installmentCardMonth->month,
            'currency' => "944",
            'description' => "Test",
            'language' => "az",
            'msg_type' => "SMS",
            'client_ip_addr' => "10.10.10.10",
        ];

        $qstring = http_build_query($data);


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $payURL);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $qstring);
        curl_setopt($curl, CURLOPT_SSLCERT, $PublicCertFile);
        curl_setopt($curl, CURLOPT_SSLKEY, $PrivateKeyFile);
        // curl_setopt($curl, CURLOPT_SSLKEYTYPE, "PEM");
        // curl_setopt($curl, CURLOPT_SSLKEYPASSWD, "123456");
        curl_setopt($curl, CURLOPT_CAPATH, $CAFile);
        curl_setopt($curl, CURLOPT_SSLCERTTYPE, "PEM");
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $trans_ref = explode(':', $response)[1];

            // print_r($trans_ref);exit();
            if (empty($trans_ref)) {
                exit();
            }

            $trans_id = str_replace(' ', '', $trans_ref);

            $trans_ref = urlencode($trans_ref);


            $order->update(['session_id'=>$trans_id]);


            // Adding TRANS_REF to the client URL of the CardSuite ECOMM module
            $client_url = $client_handler . "?trans_id=" . $trans_ref;
            header('Location: ' . $client_url);
            // Redirecting the Client to the client URL of the CardSuite ECOMM module
            exit();
        }

    }

    // PashaBank

    /**
     * @param $order
     * @return void
     */

    public function requestPasha($order): void
    {

        $client_handler = "https://ecomm.pashabank.az:8463/ecomm2/ClientHandler";
        $payURL = "https://ecomm.pashabank.az:18443/ecomm2/MerchantHandler"; // pay URL
        $PublicCertFile = public_path('certificate/certificate.0018715.pem'); // Public Cert File
        $PrivateKeyFile = public_path('certificate/bytelecom_cash_key.pem'); // Private Key File
        $CAFile = public_path('certificate/PSroot_key.pem'); // CA File
        $data = [
            'command' => "V",
            'amount' => 100 * $order->total_amount,
            'currency' => 944,
            'description' => "Test",
            'language' => "az",
            'msg_type' => "SMS",
            'client_ip_addr' => "10.10.10.10",
        ];

        $qstring = http_build_query($data);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $payURL);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $qstring);
        curl_setopt($curl, CURLOPT_SSLCERT, $PublicCertFile);
        curl_setopt($curl, CURLOPT_SSLKEY, $PrivateKeyFile);
        // curl_setopt($curl, CURLOPT_SSLKEYTYPE, "PEM");
        // curl_setopt($curl, CURLOPT_SSLKEYPASSWD, "123456");
        curl_setopt($curl, CURLOPT_CAPATH, $CAFile);
        curl_setopt($curl, CURLOPT_SSLCERTTYPE, "PEM");
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $trans_ref = explode(':', $response)[1];

            // print_r($trans_ref);exit();
            if (empty($trans_ref)) {
                exit();
            }

            $trans_id = str_replace(' ', '', $trans_ref);

            $trans_ref = urlencode($trans_ref);

            $order->update(['session_id'=>$trans_id]);

            // Adding TRANS_REF to the client URL of the CardSuite ECOMM module
            $client_url = $client_handler . "?trans_id=" . $trans_ref;
            header('Location: ' . $client_url);
            // Redirecting the Client to the client URL of the CardSuite ECOMM module
            exit();
        }
    }
}
