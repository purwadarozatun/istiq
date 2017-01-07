@extends('ui::layouts.error')

@section('content')
    <div class="ui section hidden divider"></div>
    <div class="ui segment very padded">
        <h1 class="ui header centered"><div class="sub header">Whoops...</div>Internal Server Error</h1>
        <div class="ui segment basic very padded">
            <h3 class="ui header">Message</h3>
            {{ $message }}
        </div>
    </div>
@endsection
