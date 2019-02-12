@extends('templates.master_template')

@section('content-view')
    <h4>{{ session('catalog')['tittle'] }}</h4>
    <h5>{{ session('catalog')['subtittle'] }}</h5>
    @forelse(session('catalog')['success'])
        <ul>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
            <li>
                <a href="{{ route('spiecie.info', ['spiecie' => $catalog[1]->name]) }}"></a>
            </li>
        </ul>

    @else
        <span>None spiecie found.</span>
    @endforelse

@endsection
