@extends('layouts.app') 
@section('content')
    <div class="container">
        <h2>Create Project</h2>

        <form method="post" action="{{ route('projects.store') }}">
            @csrf

            <div class="form-group">
                <label for="system_owner">System Owner (Business Unit):</label>
                <select class="form-control" id="system_owner" name="system_owner" required>
                    <option value="" disabled selected>Select System Owner</option>
                    @foreach($businessUnits as $businessUnit)
                        <option value="{{ $businessUnit->name }}">{{ $businessUnit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="system_pic">System PIC (Developer):</label>
                <select class="form-control" id="system_pic" name="system_pic" required>
                    <option value="" disabled selected>Select System PIC</option>
                    @foreach($developers as $developer)
                        <option value="{{ $developer->name }}">{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" onchange="calculateDuration()" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" onchange="calculateDuration()" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration (days):</label>
                <input type="number" class="form-control" id="duration" name="duration" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="pending" selected>Pending</option>
                    <option value="completed">Completed</option>
                    <option value="in-progress">In Progress</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lead_developer">Lead Developer:</label>
                <select class="form-control" id="lead_developer" name="lead_developer" required>
                    <option value="" disabled selected>Select Lead Developer</option>
                    @foreach($developers as $developer)
                        <option value="{{ $developer->name }}">{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="developers">Developers (comma-separated):</label>
                <textarea class="form-control" id="developers" name="developers" ></textarea>
            </div>

            <div class="form-group">
                <label for="methodology">Methodology:</label>
                <input type="text" class="form-control" id="methodology" name="methodology" required>
            </div>

            <div class="form-group">
                <label for="platform">Platform:</label>
                <select class="form-control" id="platform" name="platform" required>
                    <option value="web-based">Web-based</option>
                    <option value="mobile">Mobile</option>
                    <option value="stand-alone">Stand-alone</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deployment_type">Deployment Type:</label>
                <select class="form-control" id="deployment_type" name="deployment_type" required>
                    <option value="cloud">Cloud</option>
                    <option value="on-premise">On-Premise</option>
                </select>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Create Project</button>
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
