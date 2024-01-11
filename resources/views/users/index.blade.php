@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Users List</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    @if(auth()->user()->role == 'manager')
                        <th>Action</th> <!-- New column for delete button -->
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        @if(auth()->user()->role == 'manager')
                            <td>
                                @if($user->role !== 'manager')
                                    <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @else
                                    <!-- Display a message or another action for manager role -->
                                    Unable to delete
                                @endif
                            </td>
                        @endif
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(auth()->user()->role == 'manager')
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        @endif
    </div>
@endsection
