<?php

namespace App\Http\Controllers\UserPanel\Setting\Competence;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceService
{
    public function save(Competence $competence, Request $request)
    {
        $competence->company_id = $request->company_id;
        $competence->name = $request->name;
        $competence->save();

        return $competence;
    }

    public function destroy(Competence $competence)
    {
        $competence->employees()->detach();
        $competence->delete();
    }
}
