<?php

namespace App\Http\Controllers\UserPanel\Integration;

use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Cyberduck\LaravelExcel\Importer\Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function index()
    {
        return view('pages.integration.excel.index');
    }

    public function store(Request $request)
    {
        try {
            $name = date('Ymd_His');
            $file = $request->file('file');
            $fileName = $name . '-' . $file->getClientOriginalName();
            $path = public_path('/integration/excel/');
            $file->move($path, $fileName);

            $excel = new Excel();
            $excel->load($path . $fileName);
            $collection = $excel->getCollection();

            $jobList = [];

            foreach ($collection as $data) {
                $jobList[] = [
                    'id' => $data[0],
                    'oncelik' => $data[1],
                    'Turu' => $request->type
                ];
            }

            $jobSystemApi = new JobsSystemApi();
            $jobSystemApi->SetJobsExcel($jobList);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla İçe Aktarıldı']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API Bağlantısında Bir Sorun Meydana Geldi!']);
        }
    }
}
