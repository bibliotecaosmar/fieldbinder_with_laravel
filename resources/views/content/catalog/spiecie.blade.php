@extends('templates.master_template')

@section('content-view')
    @if(session('spiecie')['success'])
        <a href="{{ route('pagination.indexer', ['niche' =>  session('spiecie')['niche']->id]) }}">
            <h4>
                Catalog
            </h4>
            <h5>
                {{ session('spiecie')['niche']->name }}
            </h5>
        </a>
        <table>
            <img src="{{ session('spiecie')['spiecie']->pic_id }}" alt="{{ session('spiecie')['spiecie']->name }}">
            <thead>
                <tr>
                    <tb>Spiecie:</tb>
                    <tb>Niche:</tb>
                    <tb>Habitat</tb>
                    <tb>Common Name:</tb>
                    <tb>Authors:</tb>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <tb>{{ session('spiecie')['spiecie']->name }}</tb>
                    <tb>{{ session('spiecie')['spiecie']->niche_id }}</tb>
                    <tb>{{ session('spiecie')['spiecie']->habitat }}</tb>
                    <tb>{{ session('spiecie')['spiecie']->common_name }}</tb>
                    <tb>{{ session('spiecie')['spiecie']->authors }}</tb>
                </tr>
            </tbody>
        </table>
    @else
        {{ session('spiecie')['message'] }}
    @endif
@endsection
