<?php

namespace App\Http\Controllers\Project\Project\File;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function create(Request $request)
    {
        return response()->json(File::with(['uploader', 'relation'])->find((new FileService(new File))->store($request)->id), 200);
    }
}
