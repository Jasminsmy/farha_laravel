@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Progress Report</h2>

        <form method="post" action="{{ route('progress_reports.store', ['projectId' => $projectId]) }}">
            @csrf

            <input type="hidden" name="project_id" value="{{ $projectId }}">

            <div class="form-group">
                <label for="project_id">Project ID:</label>
                <input type="text" class="form-control" id="project_id" name="project_id" value="{{ $projectId }}" readonly>
            </div>

            <div class="form-group">
                <label for="progress_date">Progress Date:</label>
                <input type="date" class="form-control" id="progress_date" name="progress_date" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="on-track">On Track</option>
                    <option value="delayed">Delayed</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Create Progress Report</button>
            <a href="{{ route('projects.show', ['project' => $projectId]) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
