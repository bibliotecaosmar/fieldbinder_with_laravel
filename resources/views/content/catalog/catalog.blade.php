@extends('templates.master_template')

@section('content-view')
    @if(session('store')['success'])
        <span>
            {{ session('store')['message'] }}
        </span>
    @endif

    @if(session('catalog')['success'])
        {{ $catalog = session('catalog')['catalog'] }}
        {{ $niche   = session('catalog')['niche'] }}
        <a href="{{ route('pagination.indexer', ['niche' =>  $niche->id]) }}">
            <h4>
                Catalog
            </h4>
            <h5>
                {{ $niche->name }}
            </h5>
        </a>
        @foreach($catalog as $spiecie)
            <li>
                <a href="{{ route('spiecie.show', ['id' => $spiecie->id]) }}">
                    <img src="{{ $spiecie->pic_id }}" alt="{{ $spiecie->name }}">
                    <span id="spiecieInfo">{{ $spiecie->name }}</span>
                </a>
            </li>
        @endforeach
        <div>
            {{ $catalog->links() }}
        </div>
    @else
        <span>None spiecie found.</span>
    @endif
@endsection
