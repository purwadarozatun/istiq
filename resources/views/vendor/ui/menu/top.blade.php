<div class="ui menu secondary" style="border-radius: 0">
    <div class="item borderless" style="padding-right: 0">
        <img src="{{ asset('img/logo.png') }}" class="ui image avatar" alt="">
    </div>
    <div class="item borderless">
        <h3>{{ config('app.name') }}</h3>
    </div>
    <div class="menu right">
        @if(auth()->guest())
            <a href="{{ route('auth::login') }}" class="item">Login</a>
            <a href="{{ route('auth::register') }}" class="item">Register</a>
        @else
            <div class="item">Login as {{ auth()->user()->name }}</div>
            <a href="{{ route('auth::logout') }}" class="item">Logout</a>
        @endif
    </div>
</div>
