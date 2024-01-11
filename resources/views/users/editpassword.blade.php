<!-- resources/views/users/edit_password.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Password</h2>

        <form method="post" action="{{ route('profile.update_password', ['user' => $user->id]) }}">
            @csrf
            @method('PUT')

            <!-- Add password fields and validation as needed -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="mb-3">
                <a href="{{ route('profile', ['user' => $user->id]) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
        </form>
    </div>
@endsection
