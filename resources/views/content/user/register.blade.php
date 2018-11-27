@extends('templates.master_template')
    
@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        @include('templates.form.input', ['input' => 'nickname', 'attributes' => ['placeholder' => 'nickname']])
        @include('templates.form.date', ['input' => 'birth', 'class' => 'form-default', 'attributes' => ['placeholder' => '01/01/1900']])
        @include('templates.form.input', ['input' => 'email', 'class' => 'form-default', 'attributes' => ['placeholder' => 'email']])
        @include('templates.form.password', ['input' => 'password', 'class' => 'form-default', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.input', ['input' => 'name', 'class' => 'form-default', 'attributes' => ['placeholder' => 'name']])
        @include('templates.form.file', ['input' => 'diploma', 'class' => 'form-default', 'attributes' => ['placeholder' => 'file.pdf']])
        @include('templates.form.submit', ['input' => 'submit', 'class' => 'form-default', 'class' => 'default-button'])
    {!! Form::close() !!}
@endsection