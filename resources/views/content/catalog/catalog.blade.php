@extends('templates.master_template')

@section('content-view')  
    @if(isset($message[0]))
        <div class="container">
            @foreach($message as $messages)
                <div class="row">
                    {{ $message }}
                </div>
            @endforeach
        </div>
    @endif
@endsection