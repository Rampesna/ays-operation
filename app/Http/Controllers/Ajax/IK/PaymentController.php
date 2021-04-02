<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPayment(Request $request)
    {
        return response()->json(Payment::find($request->id) ?? null, 200);
    }
}
