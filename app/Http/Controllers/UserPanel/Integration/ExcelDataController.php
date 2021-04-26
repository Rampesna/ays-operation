<?php

namespace App\Http\Controllers\UserPanel\Integration;

use App\Http\Api\OperationApi\DataScanning\DataScanningApi;
use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Cyberduck\LaravelExcel\Importer\Excel;
use Illuminate\Http\Request;

class ExcelDataController extends Controller
{
    public function index()
    {
        return view('pages.integration.excel-data.index');
    }

    public function store(Request $request)
    {
        if ($request->file('file')->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            try {
                $jobList = [];
                $name = date('Ymd_His');
                $file = $request->file('file');
                $fileName = $name . '-' . $file->getClientOriginalName();
                $path = public_path('/integration/excel-data/');
                $file->move($path, $fileName);

                $excel = new Excel();
                $excel->load($path . $fileName);
                $collection = $excel->getCollection();

                foreach ($collection as $data) {
                    $jobList[] = [
                        'grupKodu' => $data[0],
                        'vknTckn' => $data[1],
                        'unvan' => $data[2],
                        'sehir' => $data[3] ? preg_match('/[^a-zA-Z\d]/', str_replace(' ', '', $data[3])) ? 'YOK' : str_replace(' ', '', $data[3]) : 'YOK',
                        'ilce' => $data[4] ? preg_match('/[^a-zA-Z\d]/', str_replace(' ', '', $data[4])) ? 'YOK' : str_replace(' ', '', $data[4]) : 'YOK',
                        'islemAdi' => $request->process_name
                    ];
                }

                return $jobList;

//                $api = new DataScanningApi();
//                $response = $api->SetDataScanning($jobList);
//
//                if ($response->status() == 200) {
//                    return $response;
//                } else {
//                    return $response;
//                }

            } catch (\Exception $exception) {
                return $exception;
            }
        } else {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Sadece .xlsx Türündeki Dosyalar Yüklenebilir!']);
        }
    }
}
