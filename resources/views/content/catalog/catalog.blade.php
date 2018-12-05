@extends('templates.master_template')

@section('content-view')
    @for($i=0; $i<3; $i++)
        <div class="row">
            @for($j = $i * 3; $j < ($j + 3); $j++)
                <div class="col-1">
                    <a href="{{ route('catalog.spiecies') }}">
                        <img src="img/{{ $catalog['pic'] }}" alt="{{ $catalog['common_name'] }}">
                        <label>{{ $catalog['spiecie'] }}</label>
                    </a>
                </div>
            @endfor
        </div>
    @endfor
    

@endsection