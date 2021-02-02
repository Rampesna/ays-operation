<?php

namespace App\Http\Controllers\Setting\Competence;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        return view('pages.setting.competence.index', [
            'competences' => Competence::with('company')->get()
        ]);
    }

    public function store(Request $request)
    {
        $queue = (new CompetenceService)->save(new Competence, $request);
        return response()->json($queue, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(Competence::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $queue = (new CompetenceService)->save(Competence::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new CompetenceService)->destroy(Competence::find($request->id));
        return response()->json('success', 200);
    }
}
