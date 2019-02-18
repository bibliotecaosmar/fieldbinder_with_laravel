@extends('templates.master_template')

@section('content-view)
    @forelse(session('catalog')['success'])
        <li>
            <a href="route('spiecie.show', ['id' => $spiecie->id])">
                <img src="{{!! $spiecie->pic_id !!}}" alt="{{!! $spiecie->name !!}}">
                <span id="spiecieInfo">{{!! $spiecie->name !!}}</span>
            </a>
        </li>
    @else
        <span>None spiecie found.</span>
    @endforelse
    <div>
        {{!! $catalog->links(); !!}}
    </div>
@endsection
