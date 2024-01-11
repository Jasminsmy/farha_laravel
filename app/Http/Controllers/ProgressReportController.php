<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressReport;

class ProgressReportController extends Controller
{
    public function index()
    {
        $progressReports = ProgressReport::all();
        return view('progress_reports.index', compact('progressReports'));
    }

    public function create($projectId = null)
    {
        return view('progress_reports.create', compact('projectId'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['project_id'] = $request->input('project_id');

        $progressReport = ProgressReport::create($data);

        return redirect()->route('projects.show', ['project' => $request->input('project_id')]);
    }

    public function show(ProgressReport $progressReport)
    {
        return view('progress_reports.show', compact('progressReport'));
    }

    public function edit(ProgressReport $progressReport)
    {
        return view('progress_reports.edit', compact('progressReport'));
    }

    public function update(Request $request, ProgressReport $progressReport)
    {
        $progressReport->update($request->all());
        return redirect()->route('progress_reports.index');
    }

    public function destroy(ProgressReport $progressReport)
    {
        $projectId = $progressReport->project_id; // Get the project ID before deletion
        $progressReport->delete();

        return redirect()->route('projects.show', ['project' => $projectId])->with('success', 'Progress Report deleted successfully.');
    }
}
