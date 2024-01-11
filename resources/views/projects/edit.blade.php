@extends('layouts.app')  <!-- issue where dropdown are not showing the value stored in table/database -->

@section('content')
    <div class="container">
        <h2>Edit Project</h2>

        <form method="post" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')

        <div class="form-group">
            <label for="system_owner">System Owner (Business Unit):</label>
            <select class="form-control" id="system_owner" name="system_owner" required>
                @foreach($businessUnits as $businessUnit)
                    <option value="{{ $businessUnit->name }}" {{ $project->system_owner == $businessUnit->name ? 'selected' : '' }}>
                        {{ $businessUnit->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="system_pic">System PIC (Developer):</label>
            <select class="form-control" id="system_pic" name="system_pic" value="{{ $project->system_pic }}"required>
                @foreach($developers as $developer)
                    <option value="{{ $developer->name }}" {{ $project->system_pic == $developer->id ? 'selected' : '' }}>
                        {{ $developer->name }}
                    </option>
                @endforeach
            </select>
        </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" onchange="calculateDuration()" value="{{ $project->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" onchange="calculateDuration()" value="{{ $project->end_date }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration (days):</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ $project->duration }}" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" value="{{ $project->status }}"required>
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="in-progress" {{ $project->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lead_developer">Lead Developer:</label>
                <select class="form-control" id="lead_developer" name="lead_developer" value="{{ $project->lead_developer}}"required>
                    <option value="" disabled selected>Select Lead Developer</option>
                    @foreach($developers as $developer)
                        <option value="{{ $developer->name }}">{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="developers">Developers (comma-separated):</label>
                <textarea class="form-control" id="developers" name="developers">{{ $project->developers }} value="{{ $project->developers }}"</textarea>
            </div>

            <div class="form-group">
                <label for="methodology">Methodology:</label>
                <input type="text" class="form-control" id="methodology" name="methodology" value="{{ $project->methodology }}" required>
            </div>

            <div class="form-group">
                <label for="platform">Platform:</label>
                <select class="form-control" id="platform" name="platform" value="{{ $project->platform }}" required>
                    <option value="web-based">Web-based</option>
                    <option value="mobile">Mobile</option>
                    <option value="stand-alone">Stand-alone</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deployment_type">Deployment Type:</label>
                <select class="form-control" id="deployment_type" name="deployment_type" value="{{ $project->deployment_type }} required>
                    <option value="cloud">Cloud</option>
                    <option value="on-premise">On-Premise</option>
                </select>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Update Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

        <script>
            function calculateDuration() {
                var startDate = new Date(document.getElementById('start_date').value);
                var endDate = new Date(document.getElementById('end_date').value);

                if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                    var duration = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24));
                    document.getElementById('duration').value = duration;
                }
            }
        </script>
    </div>
@endsection
