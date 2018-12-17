@extends('templates.master_template')

@section('content-view')

    @if(session('catalog')['success'])


    @else
        <span>None spiecie found.</span>
    @endif

@endsection
