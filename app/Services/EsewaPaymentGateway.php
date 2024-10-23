<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EsewaPaymentGateway
{
    protected $baseUrl;
    protected $merchantId;
    protected $secretKey;

    public function __construct()
    {
        $this->baseUrl = config('services.esewa.base_url');
        $this->merchantId = config('services.esewa.merchant_id');
        $this->secretKey = config('services.esewa.secret_key');
    }

    public function initiatePayment($amount, $paymentId)
    {
        $txAmt = 0; //txAmt is 0 if not applicable
        $psc = 0;   //psc is 0 if not applicable
        $pdc = 0;   //pdc is 0 if not applicable
        $response = Http::post("{$this->baseUrl}/epay/main", [
            'amt' => $amount,
            'pid' => $paymentId,
            'scd' => $this->merchantId,
            'txAmt' => $txAmt,
            'psc' => $psc,
            'pdc' => $pdc,
            'su' => route('payments.success', $paymentId),
            'fu' => route('payments.fail', $paymentId),
        ]);

        if ($response->successful()) {
            return (object)[
                'isSuccessful' => true,
                'redirectUrl' => "{$this->baseUrl}/epay/main?" . http_build_query([
                    'amt' => $amount,
                    'pid' => $paymentId,
                    'scd' => $this->merchantId,
                    'txAmt' => $txAmt,
                    'psc' => $psc,
                    'pdc' => $pdc,
                    'su' => route('payments.success', $paymentId),
                    'fu' => route('payments.fail', $paymentId),
                ]),
            ];
        }

        return (object)[
            'isSuccessful' => false,
            'redirectUrl' => null,
        ];
    }

    public function verifyPayment($data)
    {
        $response = Http::post("{$this->baseUrl}/epay/transrec", [
            'amt' => $data['amt'],
            'rid' => $data['refId'],
            'pid' => $data['oid'],
            'scd' => $this->merchantId,
        ]);

        return (object)[
            'isSuccessful' => $response->successful() && $response['response_code'] == 'Success',
        ];
    }
}
