<?php

namespace App\Http\Controllers;

use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    public function getMptInvoiceAmount(Request $request)
    {
        $mpt = new Mpt();
        $mpt->setMonth($request->month ?: 1);
        
        return response()->json([
            'data' => $mpt->calculateTotalAmount()
        ]);
    }
    
    public function getOoredooInvoiceAmount(Request $request)
    {
        $ooredoo = new Ooredoo();
        $ooredoo->setMonth($request->month ?: 1);

        return response()->json([
            'data' => $ooredoo->calculateTotalAmount()
        ]);
    }
}
