<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethod\PaymentMethodStoreRequest;
use App\Http\Requests\PaymentMethod\PaymentMethodUpdateRequest;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use App\Http\Resources\PaymentMethod\PaymentMethodsResource;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethodsResource::collection(PaymentMethod::all());
        return response()->json(compact('paymentMethods'));
    }

    public function store(PaymentMethodStoreRequest $request)
    {
        $validated = $request->validated();
        $paymentMethod = PaymentMethod::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'paymentMethod created successfully',
            'paymentMethod' => new PaymentMethodResource($paymentMethod)
        ], 201);
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return response()->json(['paymentMethod' => new PaymentMethodResource($paymentMethod)]);
    }

    public function update(PaymentMethodUpdateRequest $request, PaymentMethod $paymentMethod)
    {
        $validated = $request->validated();
        $paymentMethod->update($validated);
        $paymentMethod->save();
        return response()->json([
            'success' => true,
            'message' => 'paymentMethod updated successfully',
            'paymentMethod' => new PaymentMethodResource($paymentMethod)
        ], 200);
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return response()->json([
            'success' => true,
            'message' => 'paymentMethod deleted successfully'
        ], 200);
    }
}
