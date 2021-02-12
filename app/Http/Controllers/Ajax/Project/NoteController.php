<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Project;
use App\Services\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create(Request $request)
    {
        $note = (new NoteService(new Note))->store($request);
        return response()->json(Note::with(['creator'])->find($note->id), 200);
    }

    public function edit(Request $request)
    {
        return response()->json(Note::with(['creator'])->find($request->note_id));
    }

    public function update(Request $request)
    {
        $note = (new NoteService(Note::find($request->note_id)))->store($request);
        return response()->json(Note::with(['creator'])->find($note->id), 200);
    }

    public function delete(Request $request)
    {
        Note::find($request->note_id)->delete();
    }
}
