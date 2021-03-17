<?php

namespace App\Http\Controllers\UserPanel\Analysis;

use App\Http\Api\NetsantralApi;
use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Controllers\Controller;
use App\Models\CallAnalysis;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function employeeCallAnalysisCreate()
    {
        return view('pages.analysis.employee-call-analysis-create');
    }

    public function employeeCallAnalysisStore(Request $request)
    {
        try {
            $employees = Company::find($request->company_id)->employees()->where('extension_number', '<>', null)->get();
            $extensions = [];
            foreach ($employees as $employee) {
                $extensions[] = $employee->extension_number;
            }

            $netsantralApi = new NetsantralApi();
            $response = $netsantralApi->EmployeeCallAnalysis($extensions, $request->start_date, $request->end_date);

            foreach ($response['incoming'] as $incoming) {
                $employee = Employee::where('extension_number', $incoming["extension"])->first();

                $callAnalysis = CallAnalysis::
                where('employee_id', $employee->id)->
                where('date', $incoming["date"])->
                first();

                if (is_null($callAnalysis)) {
                    $callAnalysis = new CallAnalysis;
                }

                $callAnalysis->company_id = $employee->company_id;
                $callAnalysis->employee_id = $employee->id;
                $callAnalysis->date = $incoming["date"];
                $callAnalysis->total_success_call = $incoming["total_success_call"];
                $callAnalysis->total_ring_time = $incoming["total_ring_time"];
                $callAnalysis->total_wait_time = $incoming["total_wait_time"];
                $callAnalysis->total_call_time = $incoming["total_call_time"];
                $callAnalysis->operational_productivity_rate = $incoming["operational_productivity_rate"];
                $callAnalysis->incoming_success_call = $incoming["incoming_success_call"];
                $callAnalysis->incoming_total_call_time = $incoming["incoming_total_call_time"];
                $callAnalysis->outgoing_success_call = $incoming["outgoing_success_call"];
                $callAnalysis->outgoing_total_call_time = $incoming["outgoing_total_call_time"];
                $callAnalysis->save();
            }

            foreach ($response['outgoing'] as $outgoing) {
                $employee = Employee::where('extension_number', $outgoing["extension"])->first();

                $callAnalysis = CallAnalysis::
                where('employee_id', $employee->id)->
                where('date', $outgoing["date"])->
                first();

                if (is_null($callAnalysis)) {
                    $callAnalysis = new CallAnalysis;
                }

                $callAnalysis->company_id = $employee->company_id;
                $callAnalysis->employee_id = $employee->id;
                $callAnalysis->date = $outgoing["date"];
                $callAnalysis->total_error_call = $outgoing["outgoing_error_call"];
                $callAnalysis->outgoing_error_call = $outgoing["outgoing_error_call"];
                $callAnalysis->save();
            }

            return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Tamamlandı']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Sorun Oluştu!']);
        }
    }

    public function employeeJobAnalysisCreate()
    {
        return view('pages.analysis.employee-job-analysis-create');
    }

    public function employeeJobAnalysisStore(Request $request)
    {
        try {
            $api = new PersonReportApi();
            $response = $api->GetPersonReport('2021-03-11', '2021-03-11');

            return $response;

//            return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Başarıyla Tamamlandı. Rapor Oluşturabilirsiniz']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Hata Oluştu! Sistem Yöneticisi İle İletişime Geçin.', 'exception' => $exception]);
        }
    }

    public function queueCallAnalysisCreate()
    {
        return view('pages.analysis.queue-call-analysis-create');
    }

    public function queueCallAnalysisStore(Request $request)
    {
        $queuesFromDatabase = Company::find($request->company_id)->queues()->get();
        $queues = [];
        foreach ($queuesFromDatabase as $queue) {
            $queues[] = $queue->short;
        }

        try {
            $netsantralApi = new NetsantralApi();
            $response = $netsantralApi->QueueAnalysis($queues, $request->start_date, $request->end_date);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API\'ye Bağlanırken Bir Hata Oluştu! Bağlantıları Kontrol Edin.']);
        }

        try {
            foreach ($response['incoming'] as $incoming) {
                $queue = Queue::where('short', $incoming["name"])->first();

                $queueAnalysis = QueueAnalysis::
                where('queue_id', $queue->id)->
                where('date', $incoming["date"])->
                first();

                if (is_null($queueAnalysis)) {
                    $queueAnalysis = new QueueAnalysis;
                }

                $queueAnalysis->company_id = $queue->company_id;
                $queueAnalysis->queue_id = $queue->id;
                $queueAnalysis->date = $incoming["date"];
                $queueAnalysis->total_incoming_call = $incoming["total_incoming_call"];
                $queueAnalysis->total_incoming_success_call = $incoming["total_incoming_success_call"];
                $queueAnalysis->total_incoming_error_call = $incoming["total_incoming_error_call"];
                $queueAnalysis->total_incoming_abandoned_call = $incoming["total_incoming_abandoned_call"];
                $queueAnalysis->total_incoming_in_of_company_call = 0;
                $queueAnalysis->total_incoming_out_of_company_call = 0;
                $queueAnalysis->save();
            }

            foreach ($response['outgoing'] as $outgoing) {
                $queue = Queue::where('short', $outgoing["name"])->first();

//                $calculating = $this->calculating($queue, $outgoing["date"]);
//                $calculated = count($calculating['answered']) + count($calculating['noAnswer']);

                $queueAnalysis = QueueAnalysis::
                where('queue_id', $queue->id)->
                where('date', $outgoing["date"])->
                first();

                if (is_null($queueAnalysis)) {
                    $queueAnalysis = new QueueAnalysis;
                }

                $queueAnalysis->company_id = $queue->company_id;
                $queueAnalysis->queue_id = $queue->id;
                $queueAnalysis->date = $outgoing["date"];
                $queueAnalysis->total_outgoing_call = $outgoing["total_outgoing_call"];
                $queueAnalysis->total_outgoing_success_call = $outgoing["total_outgoing_success_call"];
                $queueAnalysis->total_outgoing_error_call = $outgoing["total_outgoing_error_call"];
                $queueAnalysis->total_outgoing_in_of_company_call = 0;
                $queueAnalysis->total_outgoing_out_of_company_call = 0;
                $queueAnalysis->save();
            }

            return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Tamamlandı']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Veriler İçe Aktarılırken Bir Hata Oluştu!']);
        }
    }

    public function jobAnalysisCreate()
    {
        return view('pages.analysis.job-analysis-create');
    }

    public function jobAnalysisStore(Request $request)
    {

    }
}
