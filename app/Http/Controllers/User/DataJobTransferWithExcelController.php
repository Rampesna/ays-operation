<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\DataScanning\DataScanningApi;
use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Cyberduck\LaravelExcel\Importer\Excel;
use Illuminate\Http\Request;

class DataJobTransferWithExcelController extends Controller
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
                        'sehir' => is_string($data[3]) ? str_replace('.', '', str_replace('-', '', str_replace('*', '', $data[3]))) : 'YOK',
                        'ilce' => is_string($data[4]) ? str_replace('.', '', str_replace('-', '', str_replace('*', '', $data[4]))) : 'YOK',
                        'islemAdi' => $request->process_name,
                        'Oncelik' => $request->priority
                    ];
                }

                $api = new DataScanningApi();
                $response = $api->SetDataScanning($jobList);

                if ($response->status() == 200) {
                    return redirect()->back()->with(['type' => 'warning', 'data' => 'Sadece .xlsx Türündeki Dosyalar Yüklenebilir!']);
                } else {
                    return $response;
                }

            } catch (\Exception $exception) {
                return $exception;
            }
        } else {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Sadece .xlsx Türündeki Dosyalar Yüklenebilir!']);
        }
    }
}
