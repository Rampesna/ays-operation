<?php

namespace App\Http\Controllers\Setting\Competence;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceService
{
    public function save(Competence $queue, Request $request)
    {
        $queue->company_id = $request->company_id;
        $queue->name = $request->name;
        $queue->save();

        return $queue;
    }

    public function destroy(Competence $competence)
    {
        $competence->employees()->detach();
        $competence->delete();
    }
}
