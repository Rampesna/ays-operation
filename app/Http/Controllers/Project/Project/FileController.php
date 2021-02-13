<?php

namespace App\Http\Controllers\Project\Project;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use App\Services\FileService;

class FileController extends Controller
{
    public function create(Request $request)
    {
        return response()->json(File::with(['uploader', 'comments'])->find((new FileService(new File))->store($request)->id), 200);
    }

    public function delete(Request $request)
    {
        File::find($request->file_id)->delete();
        return redirect()->back();
    }
}
