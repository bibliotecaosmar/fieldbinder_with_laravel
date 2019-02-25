@extends('templates.master_template')

@section('content-view')
{!! Form::open(['route' => 'spiecie.store', 'method' => 'post']) !!}
@include('templates.form.input', ['input' => 'spicie', 'attributes' => ['placeholder' => 'spiecie']])
@include('templates.form.input', ['input' => 'niche', 'attributes' => ['placeholder' => 'niche']])
@include('templates.form.input', ['input' => 'habitat', 'attributes' => ['placeholder' => 'habitat']])
@include('templates.form.input', ['input' => 'commonName', 'attributes' => ['placeholder' => 'common name']])
@include('templates.form.file', ['input' => 'pic', 'attributes' => ['id' => 'uploadLister']])
@include('templates.form.submit', ['input' => 'submit', 'class' => ''])
{!! Form::close() !!}
@endsection
