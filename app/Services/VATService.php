<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VATService
{
    /**
     * @param float $price
     * @param string $countryCode
     * @return float
     */
    public function calculateVatAmount(float $price, string $countryCode): float
    {
        $response = $this->callExternalAPI($price, $countryCode);
        return $response->json('vat_amount');
    }

    /**
     * @param float $price
     * @param string $countryCode
     * @return \Illuminate\Http\Client\Response
     */
    protected function callExternalAPI(float $price, string $countryCode)
    {
        $apiUrl = 'https://vat.abstractapi.com/v1/calculate';
        $apiKey = '2d1cf30f3e364b17ac99d68a4011aea2';

        return Http::get($apiUrl, [
            'api_key' => $apiKey,
            'amount' => $price,
            'country_code' => $countryCode
        ]);
    }
}
