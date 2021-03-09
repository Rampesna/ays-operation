<?php

namespace App\Http\Controllers\UserPanel\Analysis;

use App\Helpers\General;
use App\Http\Api\NetsantralApi;
use App\Http\Controllers\UserPanel\Analysis\Employee\Job\EmployeeJobAnalysisService;
use App\Http\Controllers\UserPanel\Analysis\Employee\Queue\EmployeeQueueAnalysisService;
use App\Http\Controllers\UserPanel\Analysis\Queue\QueueAnalysisService;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnalysisController extends Controller
{
    public function employeeCallAnalysisCreate()
    {
        return view('pages.analysis.employee-call-analysis-create');
    }

    public function employeeCallAnalysisStore(Request $request)
    {
        $employees = Company::find($request->company_id)->employees()->where('extension_number', '<>', null)->get();
        $extensions = [];
        foreach ($employees as $employee) {
            $extensions[] = $employee->extension_number;
        }

        try {
            $netsantralApi = new NetsantralApi();
            $response = $netsantralApi->EmployeeCallAnalysis($extensions, $request->start_date, $request->end_date);

            return $response;
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API\'ye Bağlanırken Bir Hata Oluştu! Bağlantıları Kontrol Edin.']);
        }
    }

    public function employeeJobAnalysisCreate()
    {
        return view('pages.analysis.employee-job-analysis-create');
    }

    public function employeeJobAnalysisStore(Request $request)
    {
        try {
            $jobAnalysisService = new EmployeeJobAnalysisService;
            $jobAnalysisService->jobsAndActivities($request);
            $jobAnalysisService->breaks($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Başarıyla Tamamlandı. Rapor Oluşturabilirsiniz']);
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

            return $response;
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API\'ye Bağlanırken Bir Hata Oluştu! Bağlantıları Kontrol Edin.']);
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
