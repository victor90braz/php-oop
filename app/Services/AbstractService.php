<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class AbstractService
{
    /**
     * @var string
     */
    public $apiUrl;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @param string $apiUrl
     * @param string $apiKey
     * @param string $countryCode
     */
    public function __construct(string $apiUrl, string $apiKey, string $countryCode)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->countryCode = $countryCode;
    }

    /**
     * @param float $price
     * @return \Illuminate\Http\Client\Response
     */
    protected function callExternalAPI(float $price)
    {

        return Http::get($this->apiUrl, [
            'api_key' => $this->apiKey,
            'amount' => $price,
            'country_code' => $this->countryCode
        ]);

    }

    /**
     * @param float $price
     * @return float
     */
    abstract public function calculateVatAmount(float $price): float;
}



