@extends('templates.master_template')

@section('horizon-view')

@endsection

@section('content-view')

    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        <div class="form-group">
            @include('templates.form.input', ['input' => 'nickname', 'attributes' => ['class' => 'form-control', 'placeholder' => 'nickname']])
            @include('templates.form.date', ['input' => 'birth', 'class' => 'form-default', 'attributes' => ['class' => 'form-control', 'placeholder' => '01/01/1900']])
            @include('templates.form.input', ['input' => 'email', 'class' => 'form-default', 'attributes' => ['class' => 'form-control', 'placeholder' => 'email']])
            @include('templates.form.password', ['input' => 'password', 'class' => 'form-default', 'attributes' => ['class' => 'form-control', 'placeholder' => 'password']])
            @include('templates.form.input', ['input' => 'name', 'class' => 'form-default', 'attributes' => ['class' => 'form-control', 'placeholder' => 'name']])
            @include('templates.form.file', ['input' => 'diploma', 'class' => 'form-default', 'attributes' => ['class' => 'form-control', 'placeholder' => 'file.pdf']])
            @include('templates.form.submit', ['input' => 'submit', 'class' => 'form-default', 'class' => 'btn btn-primary'])
        </div>
    {!! Form::close() !!}
@endsection