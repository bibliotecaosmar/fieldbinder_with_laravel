@extends('templates.master_template')

@section('horizon-view')

@endsection

@section('content-view')
    <div class="container">
        <div class="container-view">
            {!! Form::open(['route' => 'spiecie.store', 'method' => 'post']) !!}
            @include('templates.form.input', ['input' => 'spicie', 'attributes' => ['placeholder' => 'spiecie']])
            @include('templates.form.input', ['input' => 'niche', 'attributes' => ['placeholder' => 'niche']])
            @include('templates.form.input', ['input' => 'habitat', 'attributes' => ['placeholder' => 'habitat']])
            @include('templates.form.input', ['input' => 'commonName', 'attributes' => ['placeholder' => 'common name']])
            @include('templates.form.file', ['input' => 'pic', 'attributes' => ['placeholder' => 'picture']])            
            @include('templates.form.submit', ['input' => 'submit', 'class' => 'default-button'])
            {!! Form::close() !!} 
        </div>
    </div>
@endsection