@extends('templates.master-template')

@section('content-view')
    @guest
        <div>
            <span>{{ session('message') }}</span>
        </div>
    @endguest

    @auth('admin')
        <table class="">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nickname</td>
                    <td>Birth</td>
                    <td>Name</td>
                    <td>Diploma</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Permission</td>
                </tr>
            </thead>
            @forelse($users as user)
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nickname ?? $user->name }}</td>
                        <td>{{ $user->birth }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->diploma }}</td>
                        <td>{{ $user->permission }}</td>
                    </tr>
                </tbody>
            @empty
                <h2>None Users</h2>
            @endforelse
        </table>
    @endauth
@endsection
