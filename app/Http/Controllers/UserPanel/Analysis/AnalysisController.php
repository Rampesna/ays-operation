<?php

namespace App\Http\Controllers\UserPanel\Analysis;

use App\Helpers\General;
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

        $dates = General::displayDates($request->start_date, $request->end_date);

        foreach ($dates as $date) {
            $params = [
                'extensionName' => $extensions,
                'startDate' => $date,
                'endDate' => $date,
                'timeName' => 'custom'
            ];

            try {
                $incomingService = new EmployeeQueueAnalysisService(Http::withHeaders([
                    'Cookie' => '19afde4f620acb9fea873c1c804171a8_backup=263a5aef62d408fe70d01db5ebb053d8fb2d7a78879161af3e088375093b581ca85f87ebdb1d5d5b3ad746724cf2e49d7d0f10e0ae87edcfc44b3566c8d6e78a8bb1014265d1c01309b6a3a418a8e1fc2ede4650181ae30b97086f455ea6cfb90465326079188d313343484893f24c18cd64eaf9316c379af952cfc8487dfce31ea7b8292a2130b47710ef672faccafc21b995dcfbcba72110de03831890ac4a67b4e3b2b856a20b0cfa761731e5c204242432; PHPSESSID=6046bf9bb47139cdb461ed4a647cc70e'
                ])->asForm()->post('http://uyumsoft.netasistan.com/istatistik/dahilibazli/adetpro', $params));
                $incomingService->incoming();

                $outgoingService = new EmployeeQueueAnalysisService(Http::withHeaders([
                    'Cookie' => '19afde4f620acb9fea873c1c804171a8_backup=263a5aef62d408fe70d01db5ebb053d8fb2d7a78879161af3e088375093b581ca85f87ebdb1d5d5b3ad746724cf2e49d7d0f10e0ae87edcfc44b3566c8d6e78a8bb1014265d1c01309b6a3a418a8e1fc2ede4650181ae30b97086f455ea6cfb90465326079188d313343484893f24c18cd64eaf9316c379af952cfc8487dfce31ea7b8292a2130b47710ef672faccafc21b995dcfbcba72110de03831890ac4a67b4e3b2b856a20b0cfa761731e5c204242432; PHPSESSID=6046bf9bb47139cdb461ed4a647cc70e'
                ])->asForm()->post('http://uyumsoft.netasistan.com/istatistik/dahilibazligiden/adet', $params));
                $outgoingService->outgoing();
            } catch (\Exception $exception) {
                return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Hata Oluştu!']);
            }
        }
        return redirect()->back()->with(['type' => 'success', 'data' => 'Analiz Başarıyla Tamamlandı. Rapor Oluşturabilirsiniz']);
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

        $params = [
            'queueName' => $queues,
            'startDate' => $request->start_date,
            'endDate' => $request->end_date,
            'timeName' => 'custom'
        ];

        try {
            $incomingService = new QueueAnalysisService(Http::withHeaders([
                'Cookie' => '19afde4f620acb9fea873c1c804171a8_backup=263a5aef62d408fe70d01db5ebb053d8fb2d7a78879161af3e088375093b581ca85f87ebdb1d5d5b3ad746724cf2e49d7d0f10e0ae87edcfc44b3566c8d6e78a8bb1014265d1c01309b6a3a418a8e1fc2ede4650181ae30b97086f455ea6cfb90465326079188d313343484893f24c18cd64eaf9316c379af952cfc8487dfce31ea7b8292a2130b47710ef672faccafc21b995dcfbcba72110de03831890ac4a67b4e3b2b856a20b0cfa761731e5c204242432; PHPSESSID=6046bf9bb47139cdb461ed4a647cc70e'
            ])->asForm()->post('http://uyumsoft.netasistan.com/istatistik/departmanbazli/adet', $params), $request);
            $incomingService->incoming();

            $outgoingService = new QueueAnalysisService(Http::withHeaders([
                'Cookie' => '19afde4f620acb9fea873c1c804171a8_backup=263a5aef62d408fe70d01db5ebb053d8fb2d7a78879161af3e088375093b581ca85f87ebdb1d5d5b3ad746724cf2e49d7d0f10e0ae87edcfc44b3566c8d6e78a8bb1014265d1c01309b6a3a418a8e1fc2ede4650181ae30b97086f455ea6cfb90465326079188d313343484893f24c18cd64eaf9316c379af952cfc8487dfce31ea7b8292a2130b47710ef672faccafc21b995dcfbcba72110de03831890ac4a67b4e3b2b856a20b0cfa761731e5c204242432; PHPSESSID=6046bf9bb47139cdb461ed4a647cc70e'
            ])->asForm()->post('http://uyumsoft.netasistan.com/istatistik/departmanbazligiden/adet', $params), $request);
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
