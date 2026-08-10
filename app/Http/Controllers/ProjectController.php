<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->with('category')
            ->active()
            ->ordered()
            ->get();

        return view('projects.index', [
            'projects' => $projects,
            'settings' => SiteSetting::current(),
        ]);
    }

    public function show(Project $project)
    {
        abort_unless($project->is_active, 404);

        $others = Project::query()
            ->active()
            ->ordered()
            ->where('id', '!=', $project->id)
            ->limit(4)
            ->get();

        return view('projects.show', [
            'project' => $project,
            'others' => $others,
            'settings' => SiteSetting::current(),
        ]);
    }
}
