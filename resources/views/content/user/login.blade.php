@extends('templates.master_template')

@section('horizon-view')

@endsection

@section('content-view')
    {!! Form::open(['route' => 'account.login', 'method' => 'post', 'class' => 'default-form']) !!}
        @include('templates.form.input', ['input' => 'email', 'attributes' => ['placeholder' => 'email']])
        @include('templates.form.password', ['input' => 'password', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.submit', ['input' => 'submit', 'class' => 'default-button'])
    {!! Form::close() !!}
@endsection