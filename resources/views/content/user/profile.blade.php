@extends('templates.master_template')

@section('content-view')
@if(session('auth')['success'])
    <a href="{{  }}">
        <img src="{{ session('auth')['user']->pic_id }}" alt="{{ session('auth')['user']->nickname ?? session('auth')['user']->name }}">
        {!! Form::open(['route' => 'spiecie.store', 'method' => 'post']) !!}
        @include('templates.form.file', ['input' => 'pic', 'attributes' => ['id' => 'uploadProfile']])
        @include('templates.form.submit', ['input' => 'send'])
        {!! Form::close() !!}
    </a>
    <tbody>
        <tr>
            <tb>
                @if(isset(session('auth')['user']->nickname))
                <tb>Nickname: </tb>
                <tb>Birth: </tb>
                <tb>Email: </tb>
                @else
                <tb>Name: </tb>
                <tb>Birth: </tb>
                <tb>Email: </tb>
                <tb>Diploma: </tb>
                @endif
            </tb>
        </tr>
    </thead>

    <tbody>
        <tr>
            <tb>
                @if(isset(session('auth')['user']->nickname))
                <tb>{{ session('auth')['user']->nickname }}</tb>
                <tb>{{ session('auth')['user']->birth }}</tb>
                <tb>{{ session('auth')['user']->email }}</tb>
                @else
                <tb>{{ session('auth')['user']->name }}</tb>
                <tb>{{ session('auth')['user']->birth }}</tb>
                <tb>{{ session('auth')['user']->email }}</tb>
                <tb>
                    <a href="{{ route('pic_diploma', ['pic_id' => session('auth')['user']->pic_id ])}}"></a>
                    <img src="{{ session('auth')['user']->pic_id }}" alt="{{ session('auth')['user']->name }}">
                </tb>
                @endif
            </tb>
        </tr>
    </tbody>
@endif
@endsection
