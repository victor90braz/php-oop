<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VATServiceController extends Controller
{
    /**
     * @param Request $request
     * @return float
     */
    public function getVatAmount(Request $request)
    {
        $amount = $request->query('amount');
        $countryCode = $request->query('country_code');

        return (new \App\Services\VATService())->calculateVatAmount( $amount,$countryCode);
    }
}

