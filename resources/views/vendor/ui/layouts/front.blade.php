@extends('ui::layouts.base')

@section('body')
    <div class="ui divider hidden"></div>
    <div class="ui container">
        @include('ui::menu.top')
    </div>
    <div class="ui divider section hidden"></div>
    @yield('content')
@endsection
