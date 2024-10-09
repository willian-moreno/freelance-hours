<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        return view('projects.index');
    }

    public function details(Request $request)
    {
        $project = Project::query()->where('uuid', $request->uuid)->first();

        return view('projects.details', compact('project'));
    }
}
