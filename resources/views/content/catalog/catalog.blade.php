@extends('templates.master_template')

@section('content-view')
    <h4>{{ session('catalog')['tittle'] }}</h4>
    <h5>{{ session('catalog')['subtittle'] }}</h5>
    @forelse(session('catalog')['success'])
        $catalog->

    @else
        <span>None spiecie found.</span>
    @endforelse

@endsection
