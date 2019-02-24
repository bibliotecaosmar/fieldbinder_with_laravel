@extends('templates.master_template')

@section('content-view')
    {!! Form::open(['route' => 'dashboard.login', 'method' => 'post', 'class' => '']) !!}
            @include('templates.form.input', [
            'input'         => 'email',
            'attributes'    => [
            'placeholder'   => 'email',
            'class'         => ''
            ]
            ])

            @include('templates.form.password', [
            'input'         => 'password',
            'attributes'    => [
            'placeholder'   => 'password',
            'class'         => ''
            ]
            ])

            <button type="submit" class="">Login</button>
    {!! Form::close() !!}
@endsection
