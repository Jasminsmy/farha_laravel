@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Project List</h2>

        @if(auth()->user()->role == 'manager')
            <a href="{{ route('projects.create') }}" class="btn btn-success">Create Project</a>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>System Owner</th>
                    <th>System PIC</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Lead Developer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->system_owner }}</td>
                        <td>{{ $project->system_pic }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->lead_developer }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a>

                            @if(auth()->user()->role == 'manager')
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
