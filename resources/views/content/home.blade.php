@extends('templates.master_template')

@section('content-view')
    @if(isset($message[0]))
        @foreach($message as $messages)
            <div>
                {{ $message }}
            </div>
        @endforeach
    @endif
    <h3>
        This is homepage!
    </h3>
@endsection