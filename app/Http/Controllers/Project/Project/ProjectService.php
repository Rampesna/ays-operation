<?php

namespace App\Http\Controllers\Project\Project;

use Illuminate\Http\Request;

class ProjectService
{
    private $project;
    private $tab;

    public function __construct($project, $tab)
    {
        $this->project = $project;
        $this->tab = $tab;
    }

    public function overview()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function tasks()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function timesheets()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function milestones()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function files()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function comments()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function tickets()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }

    public function notes()
    {
        return [
            'project' => $this->project,
            'tab' => $this->tab
        ];
    }
}
