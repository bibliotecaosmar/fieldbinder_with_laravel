@extends('templates.master_template')

@section('horizon-view')

@endsection

@section('content-view')
    <div class="container">
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
                    <tb>{{ $spiecie->spiecie ?? null }}</tb>
                    <tb>{{ $spiecie->niche_id ?? null }}</tb>
                    <tb>{{ $spiecie->habitat ?? null }}</tb>
                    <tb>{{ $spiecie->common_name ?? null }}</tb>
                    <tb>{{ $spiecie->authors ?? null }}</tb>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
