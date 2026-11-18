@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">User accounts</h1>
            <p class="page-intro">POS staff records retrieved from the database through the User Eloquent model.</p>
        </div>
        <span class="count-pill">{{ $users->count() }} records</span>
    </header>

    <div class="table-wrap">
        <table>
            <thead>
                <tr><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created</th></tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="cell-primary">{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td class="cell-muted">{{ $user->created_at }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="cell-muted">No users found. Run the database seeder to add sample records.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="notice">The users table follows the requested TFA2 schema, which includes username, full name, and created_at. The controller retrieves rows with <code>User::query()</code>.</p>
@endsection
