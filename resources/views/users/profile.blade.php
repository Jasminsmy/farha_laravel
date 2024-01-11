<!-- resources/views/user/profile.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Profile</h2>

        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $user->id }}</dd>

            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $user->name }}</dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $user->email }}</dd>

            <!-- Add more profile details as needed -->
        </dl>

        <a href="{{ route('profile.edit_password', ['user' => $user->id]) }}" class="btn btn-primary">Edit Password</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users List</a>
    </div>
@endsection
