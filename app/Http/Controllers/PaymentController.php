<?php

namespace App\Http\Controllers;

use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Payment\PaymentsResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = PaymentsResource::collection(Payment::all());
        return response()->json(compact('payments'));
    }

    public function show(Payment $payment)
    {
        return response()->json(['payment' => new PaymentResource($payment)]);
    }
}
