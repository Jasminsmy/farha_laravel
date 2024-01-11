<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\BusinessUnit;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $businessUnits = BusinessUnit::all();
        $developers = User::where('role', 'developer')->get();
        return view('projects.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        $project = Project::create($request->all());
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        //$project->load('systemOwner.projects', 'systemPIC.projects');
        //$progressReports = $project->progressReports;
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $businessUnits = BusinessUnit::all();
        $developers = User::where('role', 'developer')->get();

        return view('projects.edit', compact('project', 'businessUnits', 'developers'));
    }


    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
