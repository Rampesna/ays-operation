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
                $name = date('Ymd_His');
                $file = $request->file('file');
                $fileName = $name . '-' . $file->getClientOriginalName();
                $path = public_path('/integration/excel-data/');
                $file->move($path, $fileName);

                $excel = new Excel();
                $excel->load($path . $fileName);
                $collection = $excel->getCollection();

                foreach ($collection as $data) {
                    if (gettype($data[0]) == 'integer') {
                        $jobList[] = [
                            'grupKodu' => $data[0],
                            'vknTckn' => $data[1],
                            'unvan' => $data[2],
                            'sehir' => preg_match('/[^a-zA-Z\d]/', str_replace(' ', '', $data[3])) ? 'YOK' : str_replace(' ', '', $data[3]),
                            'ilce' => preg_match('/[^a-zA-Z\d]/', str_replace(' ', '', $data[4])) ? 'YOK' : str_replace(' ', '', $data[4]),
                            'islemAdi' => $request->process_name
                        ];
                    }
                }

                $api = new DataScanningApi();
                $response = $api->SetDataScanning($jobList);

                if ($response->status() == 200) {
                    return redirect()->back()->with(['type' => 'success', 'data' => $response['response']]);
                } else {
                    return $response;
                }

            } catch (\Exception $exception) {
                return redirect()->back()->with(['type' => 'error', 'data' => 'API Bağlantısında Bir Sorun Meydana Geldi!']);
            }
        } else {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Sadece .xlsx Türündeki Dosyalar Yüklenebilir!']);
        }
    }
}
