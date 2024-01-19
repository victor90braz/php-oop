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
        return (new \App\Services\VATService())->calculateVatAmount($request->input('amount'));
    }
}

