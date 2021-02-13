<?php

namespace App\Services;

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
        $mimeType = $request->file('file')->getClientMimeType();
        $icon = (str_contains($mimeType, "image") || str_contains($mimeType, "audio") || str_contains($mimeType, "video")) ?
            'far fa-file-image' :
            (str_contains($mimeType, "audio") ? 'far fa-file-audio' :
                (str_contains($mimeType, "video") ? 'far fa-file-video' :
                    (str_contains($mimeType, "pdf") ? 'far fa-file-pdf' :
                        (str_contains($mimeType, "vnd.openxmlformats-officedocument.wordprocessingml") ||
                        str_contains($mimeType, "vnd.oasis.opendocument.text") ||
                        str_contains($mimeType, "vnd.ms-word") ||
                        str_contains($mimeType, "msword") ? 'far fa-file-word' :
                            (str_contains($mimeType, "vnd.oasis.opendocument.spreadsheet") ||
                            str_contains($mimeType, "vnd.openxmlformats-officedocument.spreadsheetml") ||
                            str_contains($mimeType, "vnd.ms-excel") ? 'far fa-file-excel' :
                                (str_contains($mimeType, "vnd.oasis.opendocument.presentation") ||
                                str_contains($mimeType, "vnd.openxmlformats-officedocument.presentationml") ||
                                str_contains($mimeType, "vnd.ms-powerpoint") ? 'far fa-file-powerpoint' :
                                    (str_contains($mimeType, "html") || str_contains($mimeType, "json") ? 'far fa-file-code' :
                                        (str_contains($mimeType, "gzip") || str_contains($mimeType, "zip") ? 'far fa-file-archive' : 'far fa-file-alt'))))))));

        $this->file->uploader_id = $request->uploader_id;
        $this->file->uploader_type = $request->uploader_type;
        $this->file->relation_id = $request->relation_id;
        $this->file->relation_type = $request->relation_type;
        $this->file->type = $request->file('file')->getClientMimeType();
        $this->file->icon = $icon;
        $this->file->name = $request->file('file')->getClientOriginalName();
        $this->file->path = 'assets/media/files/';
        $this->file->save();

        $request->file('file')->move('assets/media/files/', $request->file('file')->getClientOriginalName());

        return $this->file;
    }
}
