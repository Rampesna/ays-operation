<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\DataScanning\DataScanningApi;
use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Cyberduck\LaravelExcel\Importer\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CallDataTransferWithExcelController extends Controller
{
    public function index()
    {
        return view('pages.integration.call-data-scanning.index', [
            'surveys' => (new SurveySystemApi)->GetSurveyList()['response']
        ]);
    }

    public function store(Request $request)
    {
        if ($request->file('file')->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            try {
                $name = date('Ymd_His');
                $file = $request->file('file');
                $fileName = $name . '-' . $file->getClientOriginalName();
                $path = public_path('/integration/call-data/');
                $file->move($path, $fileName);

                $excel = new Excel();
                $excel->load($path . $fileName);
                $collection = $excel->getCollection();

                $jobList = [];
                $counter = 0;

                foreach ($collection as $data) {
                    if ($counter != 0) {
                        $jobList[] = [
                            'anketId' => $request->survey_id,
                            'musteriAdi' => $data[0],
                            'musteriTel' => $data[1],
                            'yetkili' => $data[2],
                            'cariId' => $data[3]
                        ];
                    }
                    $counter++;
                }

                $jobSystemApi = new DataScanningApi();
                $response = $jobSystemApi->SetCallDataScanning($jobList);

                return redirect()->back()->with(['type' => 'success', 'data' => $response['response']]);
            } catch (\Exception $exception) {
                return redirect()->back()->with(['type' => 'error', 'data' => 'API Bağlantısında Bir Sorun Meydana Geldi!']);
            }
        } else {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Sadece .xlsx Türündeki Dosyalar Yüklenebilir!']);
        }
    }
}
