<?php

namespace App\Http\Controllers\User\IK\Application\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\PaymentType;
use App\Models\Permit;
use App\Models\PermitStatus;
use App\Models\PermitType;
use App\Models\Position;
use App\Services\PaymentService;
use App\Services\PermitService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.payment.index', [
            'payments' => Payment::with([
                'employee' => function ($employee) {
                    $employee->withTrashed();
                },
                'type',
                'status'
            ])->orderBy('created_at', 'desc')->get(),
            'positions' => Position::with(['employee'])->get(),
            'paymentTypes' => PaymentType::all(),
            'paymentStatuses' => PaymentStatus::all(),
        ]);
    }

    public function create(Request $request)
    {
        try {
            $paymentService = new PaymentService;
            $paymentService->setPayment(new Payment);
            $paymentService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Ödeme Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        try {
            $paymentService = new PaymentService;
            $paymentService->setPayment(Payment::find($request->payment_id));
            $paymentService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Ödeme Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(Request $request)
    {
        try {
            Payment::find($request->id)->delete();
            return redirect()->back()->with(['type' => 'success', 'data' => 'Ödeme Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
