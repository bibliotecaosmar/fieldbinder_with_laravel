@extends('templates.master_template')

@section('content-view')

    @forelse(session('catalog')['success'])
        //

    @else
        <span>None spiecie found.</span>
    @endforelse

@endsection
