<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoapClient;

class Payment extends Model
{
    private $MerchantID;
    private $Amount;
    private $Description;
    private $CallbackURL;

    public function __construct($amount, $orderId = null)
    {
        $this->MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
        $this->Amount = $amount;
        $this->Description = 'توضیحات تراکنش تستی';
        $this->CallbackURL = 'http://127.0.0.1:8001/payment-verify/'. $orderId;

    }

    public function doPayment()
    {
        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
//        dd($client);
        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $this->Amount,
                'Description' => $this->Description,
                'CallbackURL' => $this->CallbackURL
            ]
        );
//        dd($result);
        return $result;

    }

    public function verifyPayment($authority, $status)
    {
//dd($status);
        if ($status == 'OK') {

            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $authority,
                    'Amount' => $this->Amount,
                ]
            );

            return $result;

        } else {
            return false;
        }
    }

    public function order()
    {
        return $this->hasOne(Order::class);

    }
}