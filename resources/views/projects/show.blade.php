@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Project Details</h2>

        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $project->id }}</dd>

            <dt class="col-sm-3">System Owner</dt>
            <dd class="col-sm-9">{{ optional($project->systemOwner)->name }}</dd>

            <dt class="col-sm-3">System PIC</dt>
            <dd class="col-sm-9">{{ optional($project->systemPIC)->name }}</dd>

            <dt class="col-sm-3">Start Date</dt>
            <dd class="col-sm-9">{{ $project->start_date }}</dd>

            <dt class="col-sm-3">End Date</dt>
            <dd class="col-sm-9">{{ $project->end_date }}</dd>

            <dt class="col-sm-3">Duration</dt>
            <dd class="col-sm-9">
                @php
                    $startDate = \Carbon\Carbon::parse($project->start_date);
                    $endDate = \Carbon\Carbon::parse($project->end_date);
                    echo $startDate->diffInDays($endDate) . ' days';
                @endphp
            </dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">{{ $project->status }}</dd>

            <dt class="col-sm-3">Lead Developer</dt>
            <dd class="col-sm-9">{{ $project->lead_developer }}</dd>

            <dt class="col-sm-3">Developers</dt>
            <dd class="col-sm-9">{{ $project->developers }}</dd>

            <dt class="col-sm-3">Methodology</dt>
            <dd class="col-sm-9">{{ $project->methodology }}</dd>

            <dt class="col-sm-3">Platform</dt>
            <dd class="col-sm-9">{{ $project->platform }}</dd>

            <dt class="col-sm-3">Deployment Type</dt>
            <dd class="col-sm-9">{{ $project->deployment_type }}</dd>
        </dl>

        <!-- Include the Progress Reports section -->
        <h2>Progress Reports</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project ID</th>
                    <th>Date</th>
                    <th>Progress</th>
                    <th>Description</th>
                    <th>Action</th> 
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($project->progressReports as $progressReport)
                    <tr>
                        <td>{{ $progressReport->id }}</td>
                        <td>{{ $progressReport->project_id }}</td>
                        <td>{{ $progressReport->progress_date }}</td>
                        <td>{{ $progressReport->status }}</td>
                        <td>{{ $progressReport->description }}</td>
                        <td>
                            <form method="post" action="{{ route('progress_reports.destroy', ['progress_report' => $progressReport->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(auth()->user()->name == $project->lead_developer)
            <a href="{{ route('progress_reports.create', ['projectId' => $project->id]) }}" class="btn btn-primary">Add Progress Report</a>
        @endif

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Project List</a>
    </div>
@endsection
