@extends('ui::layouts.error')

@section('content')
    <div class="ui section hidden divider"></div>
    <div class="ui segment very padded">
        <h1 class="ui header centered"><div class="sub header">Whoops...</div>Page Not Found</h1>
        <div class="ui segment basic very padded center aligned">
            <a href="{{ url('/') }}" class="ui button basic"><i class="icon home"></i> Back To Home</a>
        </div>
    </div>
@endsection
