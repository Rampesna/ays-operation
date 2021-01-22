<?php

namespace App\Http\Controllers\Analysis;

use App\Http\Controllers\Analysis\Employee\Queue\EmployeeAnalysisService;
use App\Http\Controllers\Analysis\Queue\QueueAnalysisService;
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

        $params = [
            'extensionName' => $extensions,
            'startDate' => $request->start_date,
            'endDate' => $request->end_date,
            'timeName' => 'custom'
        ];

        try {
            $incomingService = new EmployeeAnalysisService(Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/dahilibazli/adetpro', $params));
            $incomingService->incoming();

            $outgoingService = new EmployeeAnalysisService(Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/dahilibazligiden/adet', $params));
            $outgoingService->outgoing();

            return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Başarıyla Tamamlandı. Rapor Oluşturabilirsiniz']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Hata Oluştu! Sistem Yöneticisi İle İletişime Geçin.']);
        }
    }

    public function employeeJobAnalysisCreate()
    {
        return view('pages.analysis.employee-job-analysis-create');
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

        $params = [
            'queueName' => $queues,
            'startDate' => $request->start_date,
            'endDate' => $request->end_date,
            'timeName' => 'custom'
        ];

        try {
            $incomingService = new QueueAnalysisService(Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departmanbazli/adet', $params), $request);
            $incomingService->incoming();

            $outgoingService = new QueueAnalysisService(Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departmanbazligiden/adet', $params), $request);
            $outgoingService->outgoing();

            return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Başarıyla Tamamlandı. Rapor Oluşturabilirsiniz']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Hata Oluştu! Sistem Yöneticisi İle İletişime Geçin.']);
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
