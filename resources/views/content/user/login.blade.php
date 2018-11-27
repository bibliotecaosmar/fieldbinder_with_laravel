@extends('templates.master_template')

@section('content-view')
    {!! Form::open(['route' => 'dashboard.login', 'method' => 'post', 'class' => 'default-form']) !!}
        @include('templates.form.input', ['input' => 'email', 'attributes' => ['placeholder' => 'email']])
        @include('templates.form.password', ['input' => 'password', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.submit', ['input' => 'submit', 'class' => 'default-button'])
    {!! Form::close() !!}
@endsection