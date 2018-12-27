@extends('templates.master_template')

@section('horizon-view')

@endsection

@section('content-view')
    {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        <div class="form-group">
            <div class="row">
                @include('templates.form.input', [
                'input'         => 'nickname',
                'label'         => 'Nickname: ',
                'attributes'    => [
                    'placeholder'   => 'nickname',
                    'class'         => 'form-control'
                ]
                ])
            </div>
            <div class="row">
                @include('templates.form.date', [
                'input'         => 'birth',
                'label'         => 'Data of birth: ',
                'attributes'    => [
                    'placeholder'   => '01/01/1900',
                    'class'         => 'form-control'
                ]
                ])
            </div>
            <div class="row">
                @include('templates.form.input', [
                'input'         => 'email',
                'label'         => 'Email: ',
                'attributes'    => [
                    'placeholder'   => 'exampla@email.com',
                    'class'         => 'form-control'
                ]
                ])
            </div>
            <div class="row">
                @include('templates.form.password', [
                'input'         => 'password',
                'label'         => 'Password: ',
                'attributes'    => [
                    'placeholder'   => 'password',
                    'class'         => 'form-control'
                ]
                ])
            </div>
            <div class="row">
                @include('templates.form.input', [
                'input'         => 'name',
                'label'         => 'Name: ',
                'attributes'    => [
                    'placeholder'   => 'John Wak',
                    'class'         => 'form-control'
                ]
                ])
            </div>
            <div class="row">
                @include('templates.form.file', [
                'input'         => 'diploma',
                'label'         => 'Diploma(doc): ',
                'attributes'    => [
                    'placeholder'   => 'file.pdf',
                    'class'         => 'form-control'
                ]
                ])
            </div>

            @include('templates.form.submit', [
                                            'input'         => 'submit',
                                            'label'         => 'Register',
                                            'class'         => 'btn btn-primary'
            ])
        </div>
    {!! Form::close() !!}
@endsection
