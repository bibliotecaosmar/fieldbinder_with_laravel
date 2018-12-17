@extends('templates.master_template')

@section('horizon-view')

@endsection

@section('content-view')
    {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        <div class="form-group">
            @include('templates.form.input', [
                        'input'         => 'nickname',
                        'attributes'    => ['placeholder' => 'nickname']
                        ])
            @include('templates.form.date', [
                        'input'         => 'birth',
                        'attributes'    => ['placeholder' => '01/01/1900']
                        ])
            @include('templates.form.input', [
                        'input'         => 'email',
                        'attributes'    => ['placeholder' => 'email']
                        ])
            @include('templates.form.password', [
                        'input'         => 'password',
                        'attributes'    => ['placeholder' => 'password']
                        ])
            @include('templates.form.input', [
                        'input'         => 'name',
                        'attributes'    => ['placeholder' => 'name']
                        ])
            @include('templates.form.file', [
                        'input'         => 'diploma',
                        'attributes'    => ['placeholder' => 'file.pdf']
                        ])
            @include('templates.form.submit', [
                        'input'         => 'submit',
                        'class'         => 'btn btn-primary'
                        ])
        </div>
    {!! Form::close() !!}
@endsection
