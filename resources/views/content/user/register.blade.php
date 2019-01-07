@extends('templates.master_template')

@section('content-view')
    {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
        @include('templates.form.input', [
            'input'         => 'nickname',
            'label'         => 'Nickname: ',
            'attributes'    => [
                'placeholder'   => 'nickname',
                'class'         => ''
            ]
        ])

        @include('templates.form.date', [
            'input'         => 'birth',
            'label'         => 'Data of birth: ',
            'attributes'    => [
                'placeholder'   => '01/01/1900',
                'class'         => ''
            ]
        ])

        @include('templates.form.input', [
            'input'         => 'email',
            'label'         => 'Email: ',
            'attributes'    => [
                'placeholder'   => 'example@email.com',
                'class'         => ''
            ]
        ])

        @include('templates.form.password', [
            'input'         => 'password',
            'label'         => 'Password: ',
            'attributes'    => [
                'placeholder'   => 'password',
                'class'         => ''
            ]
        ])

        @include('templates.form.input', [
            'input'         => 'name',
            'label'         => 'Name: ',
            'attributes'    => [
                'placeholder'   => '',
                'class'         => ''
            ]
        ])

        @include('templates.form.file', [
            'input'         => 'diploma',
            'label'         => 'Diploma(doc): ',
            'attributes'    => [
                'placeholder'   => 'file.pdf',
                'class'         => ''
            ]
        ])

        <button type="submit" class="">Register</button>
    {!! Form::close() !!}
@endsection
