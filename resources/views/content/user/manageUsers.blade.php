@extends('templates.master-template')

@section('horizon-view')

@endsection

@section('content-view')
    <div class="container">
        <div class="container-view">
            <table class="default-table">
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
                @foreach($users as user)
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nickname ?? $user->name }}</td>
                            <td>{{ $user->birth }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->permission }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection