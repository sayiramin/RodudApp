<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Users</h1>

    <div class="mb-3">
        <form method="GET" action="{{ route('users.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="is_admin" class="form-select">
                    <option value="">All Users</option>
                    <option value="1" {{ request('is_admin') === '1' ? 'selected' : '' }}>Admins</option>
                    <option value="0" {{ request('is_admin') === '0' ? 'selected' : '' }}>Regular Users</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit">Filter</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Email Verified At</th>
            <th>Is Admin</th>
            <th>Created At</th>
            <th>Updated At</th>
            <!-- Future actions like edit or delete can be added here -->
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->formatted_email_verified_at }}</td>
                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>{{ $user->updated_at->format('Y-m-d') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No users found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
