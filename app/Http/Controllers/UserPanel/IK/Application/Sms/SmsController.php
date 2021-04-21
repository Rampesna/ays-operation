<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Sms;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeePersonalInformation;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.batch-sms.index', [
            'positions' => Position::where('end_date', null)->get()
        ]);
    }

    public function send(Request $request)
    {
        try {
            $messages = [];

            foreach ($request->employees as $employeeId) {
                $employee = Employee::with([
                    'personalInformations'
                ])->find($employeeId);

                $messages[] = [
                    'msg' => str_replace('#name#', $employee->name, $request->sms),
                    'tel' => [General::clearPhoneNumber($employee->personalInformations->phone_number)]
                ];
            }

            $response = Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('http://api.mesajpaneli.com/json_api/', [
                'data' => base64_encode(
                    json_encode([
                        'user' => [
                            'name' => '5435754775',
                            'pass' => '357159'
                        ],
                        'msgBaslik' => 'AYSSOFT',
                        'tr' => true,
                        'start' => 1490001000,
                        'msgData' => $messages
                    ])
                )
            ]);

            return redirect()->back()->with([
                'type' => 'success',
                'data' => 'SMS\'ler Başarıyla Gönderildi'
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function sendOthers(Request $request)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('http://api.mesajpaneli.com/json_api/', [
                'data' => base64_encode(
                    json_encode([
                        'user' => [
                            'name' => '5435754775',
                            'pass' => '357159'
                        ],
                        'msgBaslik' => 'AYSSOFT',
                        'tr' => true,
                        'start' => 1490001000,
                        'msgData' => [
                            [
                                'msg' => $request->sms,
                                'tel' => explode(',', General::clearTagifyTags($request->numbers))
                            ]
                        ]
                    ])
                )
            ]);

            return redirect()->back()->with([
                'type' => 'success',
                'data' => 'SMS\'ler Başarıyla Gönderildi'
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
