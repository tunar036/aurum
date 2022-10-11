<?php

namespace App\Services\Payment;

class AzeriCardApiService
{
    public $key;
    public $terminal_3;
    public $terminal_6;
    public $terminal_9;
    public $terminal_12;
    public $terminal_18;
    public $url;
    public $merch_name;

    public function  __construct(){
        $this->key = "a86d0e2b8ba60c5ef22d76e977d0038c";
        $this->terminal_3 = '17203139';
        $this->terminal_6 = '17203140';
        $this->terminal_9 = '17203141';
        $this->terminal_12 = '17203142';
        $this->terminal_18 = '17203143';
        $this->merch_name = 'Bytelecom';
        $this->url='https://mpi.3dsecure.az/cgi-bin/cgi_link';
        // $this->url='https://213.172.75.248/cgi-bin/cgi_link';
    }
    // Send Curl Request
    public function sendCurlRequest($URL,$dataa)
    {

        $options = [
            //CURLOPT_SSLVERSION     => 3,
            CURLOPT_RETURNTRANSFER => true,		// return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => '',       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_POST		   => true,
            CURLOPT_POSTFIELDS	   => http_build_query($dataa),
            CURLOPT_SSL_VERIFYPEER => false,    // don't verify
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CAINFO		   => "a.cer",
        ];
        $ch = curl_init($this->url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err     = curl_errno($ch);
        $errmsg  = curl_error($ch);
        $header  = curl_getinfo($ch);
        curl_close($ch);
        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;

    }

    public function hex2bin($hexdata){
        $bindata = "";

        for ($i = 0; $i < strlen($hexdata); $i += 2) {
            $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
        }

        return $bindata;
    }


    public function generate_azericard_form($model){
        error_reporting(-1);
        ini_set('display_errors', 1);
        $url = $this->url;
        $form ='';

        $terminal = $this->get_terminal_id($model->installmentCardMonth->month);
        $amount = $model->total_amount;
        $currency = 'AZN';
        $description = 'sifaris #'.$model->id;
        $db_row['AMOUNT'] = $amount;
        $db_row['CURRENCY'] = $currency;
        $db_row['ORDER'] = '00000'.$model->id;
        $db_row['DESC'] = $description;
        $db_row['MERCH_NAME'] = $this->merch_name;
        $db_row['MERCH_URL'] = 'https://bytelecom.com/';
        $db_row['TERMINAL'] = $terminal;          // That is your personal ID in payment system
        $db_row['EMAIL'] = 'info@bytelecom.com';
        $db_row['TRTYPE'] = '1';                    // That is the type of operation, 0 - Authorization
        $db_row['COUNTRY'] = 'AZ';
        $db_row['MERCH_GMT'] = '+4';
        $db_row['BACKREF'] = 'https://bytelecom.com/check-order-azericard.html';

        // These fields are generated automatically every request
        $oper_time = gmdate("YmdHis");          // Date and time UTC
        $nonce = substr(md5(rand()),0,16);      // Random data
        // Creating form hidden fields
        $form .=  "
            <input name=\"AMOUNT\" value=\"{$db_row['AMOUNT']}\" type=\"hidden\">
            <input name=\"CURRENCY\" value=\"{$db_row['CURRENCY']}\" type=\"hidden\">
            <input name=\"ORDER\" value=\"{$db_row['ORDER']}\" type=\"hidden\">
            <input name=\"DESC\" value=\"{$db_row['DESC']}\" type=\"hidden\">
            <input name=\"MERCH_NAME\" value=\"{$db_row['MERCH_NAME']}\" type=\"hidden\">
            <input name=\"MERCH_URL\" value=\"{$db_row['MERCH_URL']}\" type=\"hidden\">
            <input name=\"TERMINAL\" value=\"{$db_row['TERMINAL']}\" type=\"hidden\">
            <input name=\"EMAIL\" value=\"{$db_row['EMAIL']}\" type=\"hidden\">
            <input name=\"TRTYPE\" value=\"{$db_row['TRTYPE']}\" type=\"hidden\">
            <input name=\"COUNTRY\" value=\"{$db_row['COUNTRY']}\" type=\"hidden\">
            <input name=\"MERCH_GMT\" value=\"{$db_row['MERCH_GMT']}\" type=\"hidden\">
            <input name=\"TIMESTAMP\" value=\"{$oper_time}\" type=\"hidden\">
            <input name=\"NONCE\" value=\"{$nonce}\" type=\"hidden\">
            <input name=\"BACKREF\" value=\"{$db_row['BACKREF']}\" type=\"hidden\">
            ";
        // ------------------------------------------------
        // Making P_SIGN (MAC)  -         Checksum of request
        // All following fields must be equal with hidden fields above
        $to_sign = "".strlen($db_row['AMOUNT']).$db_row['AMOUNT']
            .strlen($db_row['CURRENCY']).$db_row['CURRENCY']
            .strlen($db_row['ORDER']).$db_row['ORDER']
            .strlen($db_row['DESC']).$db_row['DESC']
            .strlen($db_row['MERCH_NAME']).$db_row['MERCH_NAME']
            .strlen($db_row['MERCH_URL']).$db_row['MERCH_URL']
            .strlen($db_row['TERMINAL']).$db_row['TERMINAL']
            .strlen($db_row['EMAIL']).$db_row['EMAIL']
            .strlen($db_row['TRTYPE']).$db_row['TRTYPE']
            .strlen($db_row['COUNTRY']).$db_row['COUNTRY']
            .strlen($db_row['MERCH_GMT']).$db_row['MERCH_GMT']
            .strlen($oper_time).$oper_time
            .strlen($nonce).$nonce
            .strlen($db_row['BACKREF']).$db_row['BACKREF'];
        $p_sign = hash_hmac('sha1', $to_sign, $this->hex2bin($this->key));
        /** @var TYPE_NAME $form */

        $form .= "<input name=\"P_SIGN\" value=\"$p_sign\" type=\"hidden\">".PHP_EOL;

        return '<style type="text/css"> #page{display:none;} </style>
                <form action="'.$url.'" method="POST" id="azericard_payment_form">
                    ' . $form . '
                    <input type="submit" class="button-alt" id="submit_azericard_payment_form" value="Pay via Azericard" />
                    <script type="text/javascript">
                        document.getElementById("submit_azericard_payment_form").click();
                    </script>
                </form>';
    }




    public function getHashcCode($params) {
        return md5($this->auth_key.implode($params));
    }

    public function get_terminal_id($month){
        if ($month == 3) {
            return $this->terminal_3;
        }elseif($month == 6){
            return $this->terminal_6;
        }elseif($month == 9){
            return $this->terminal_9;
        }elseif($month == 12){
            return $this->terminal_12;
        }elseif($month == 18){
            return $this->terminal_18;
        }else{
            return $this->terminal_3;
        }
    }
}
