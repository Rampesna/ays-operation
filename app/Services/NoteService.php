<?php

namespace App\Services;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteService
{
    private $note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function store(Request $request)
    {
        $this->note->creator_id = $request->creator_id;
        $this->note->creator_type = $request->creator_type;
        $this->note->relation_id = $request->relation_id;
        $this->note->relation_type = $request->relation_type;
        $this->note->note = $request->note;
        $this->note->save();

        return $this->note;
    }
}
