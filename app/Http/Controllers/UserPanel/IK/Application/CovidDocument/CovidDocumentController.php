<?php

namespace App\Http\Controllers\UserPanel\IK\Application\CovidDocument;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\File;

class CovidDocumentController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.covid-document.index', [
            'positions' => Position::where('end_date', null)->get()
        ]);
    }

    public function create(Request $request)
    {
        ini_set('max_execution_time', '300');
        $directory = date('Y_m_d_H_i_s') . '_covid_documents';

        if (!File::isDirectory(public_path('covid-documents'))) {
            File::makeDirectory(public_path('covid-documents'), 0777, true, true);
        }

        if (!File::isDirectory(public_path('covid-documents/' . $directory))) {
            File::makeDirectory(public_path('covid-documents/' . $directory), 0777, true, true);
        }

        foreach ($request->employees as $employee) {
            $date = $request->date_type == 0 ? $request->date : $request->start_date . ' - ' . $request->end_date;
            $position = Position::with([
                'employee' => function ($employee) {
                    $employee->with([
                        'personalInformations'
                    ]);
                },
                'company'
            ])->where('employee_id', $employee)->where('end_date', null)->first();
            $data = [
                'position' => $position,
                'date' => $date,
                'startHour' => $request->start_hour,
                'endHour' => $request->end_hour
            ];
            $pdf = PDF::loadView('documents.covid-document', $data, [], 'UTF-8');
            $pdf->save(public_path('covid-documents/' . $directory . '/' . $position->employee->name . '.pdf'), 'UTF-8');
        }

        $zip = new ZipArchive;
        $fileName = $directory . '.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) == true) {
            $files = File::files(public_path('covid-documents/' . $directory . '/'));
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }
}
