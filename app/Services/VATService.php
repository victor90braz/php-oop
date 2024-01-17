<?php

namespace App\Services;

class VATService extends AbstractService
{
    /**
     * @param float $price
     * @return float
     */
    public function calculateVatAmount(float $price): float
    {
        $response = $this->callExternalAPI($price);

        return $response->json('vat_amount');
    }
}
