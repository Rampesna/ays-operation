<?php

namespace App\Http\Controllers\Project\Project\File;

use App\Models\File;
use Illuminate\Http\Request;

class FileService
{
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function store(Request $request)
    {
        $this->file->uploader_id = $request->uploader_id;
        $this->file->uploader_type = $request->uploader_type;
        $this->file->relation_id = $request->relation_id;
        $this->file->relation_type = $request->relation_type;
        $this->file->type = $request->file('file')->getClientMimeType();
        $this->file->name = $request->file('file')->getClientOriginalName();
        $this->file->path = 'assets/media/files/';
        $this->file->save();

        $request->file('file')->move('assets/media/files/', $request->file('file')->getClientOriginalName());

        return $this->file;
    }
}
