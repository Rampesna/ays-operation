<?php

namespace App\Http\Controllers\EmployeePanel\Project;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function create(Request $request)
    {
        return response()->json(File::with(['uploader', 'comments'])->find((new FileService(new File))->store($request)->id), 200);
    }
}
