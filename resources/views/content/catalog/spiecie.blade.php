@extends('templates.master_template')

@section('content-view')
    @forelse($spiecie)
        <table>
            <img src="" alt="">
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
                    <tb>{{ $spiecie->spiecie }}</tb>
                    <tb>{{ $spiecie->niche_id }}</tb>
                    <tb>{{ $spiecie->habitat }}</tb>
                    <tb>{{ $spiecie->common_name }}</tb>
                    <tb>{{ $spiecie->authors }}</tb>
                </tr>
            </tbody>
        </table>
    @else
        {{ Don't exist spiecies }}
    @endforelse
@endsection
