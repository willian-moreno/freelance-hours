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

    public function details(Project $project)
    {
        return view('projects.details', compact('project'));
    }
}
