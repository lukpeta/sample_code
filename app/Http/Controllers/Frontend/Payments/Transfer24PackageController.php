<?php

namespace App\Http\Controllers\Frontend\Payments;

use App\Http\Controllers\Controller;
use App\Services\InpostService;
use Illuminate\Http\Request;


class Transfer24PackageController extends Controller
{

    public function callback()
    {
        return redirect(route('parcel-payment-confirm', 'msg=1'), 301)->with('success', 'Zlecenie płatności zostało przekazane do realizacji. Po zaksięgowaniu płatności Twój adres email zostanie wysłana etykietka do nadania w paczkomacie');
    }

    public function confirm()
    {
        return view('frontend.payment-confirm');
    }

    public function status(Request $request, InpostService $inpostService)
    {
        return $inpostService->makePayment($request);
    }
}
