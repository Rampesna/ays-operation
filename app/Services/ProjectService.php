<?php

namespace App\Services;

use App\Helpers\General;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectService
{
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    private function clearTagifyTags($tags)
    {
        $returnObject = [];

        foreach (json_decode($tags) as $key => $tag) {
            $returnObject[] = $tag->value;
        }

        return implode(',', $returnObject);
    }

    public function store(Request $request, $status)
    {
        $status == 0 ? $this->project->company_id = $request->company_id : null;
        $this->project->name = $request->name;
        $this->project->description = $request->description;
        $this->project->start_date = $request->start_date;
        $this->project->end_date = $request->end_date;
        $this->project->tags = $request->tags ? General::clearTagifyTags($request->tags) : null;
        $this->project->save();
        $status == 0 ? $this->project->employees()->sync($request->employees) : null;

        return $this->project;
    }
}
