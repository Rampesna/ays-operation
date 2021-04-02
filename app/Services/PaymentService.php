<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentService
{
    private $payment;

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }

    public function save(Request $request)
    {
        $this->payment->employee_id = $request->employee_id;
        $this->payment->type_id = $request->type_id;
        $this->payment->status_id = $request->status_id;
        $this->payment->date = $request->date;
        $this->payment->amount = $request->amount;
        $this->payment->description = $request->description;
        $this->payment->payroll = $request->payroll;
        $this->payment->save();

        return $this->payment;
    }
}
