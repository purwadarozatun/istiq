@extends('ui::layouts.plain')
@section('content')

    <div class="ui segment basic center aligned" style="background: #1b1c1d; padding: 20px 0 100px 0;">
        <div class="ui container">

            <div class="ui basic segment right aligned">
                <a href="{{ url('etalase/dashboard') }}" class="ui button basic small purple">Demo</a>
                <a href="" class="ui button basic small purple">Dokumentasi</a>
            </div>

            <h1 class="ui inverted header massive" style="font-size: 3em; font-weight: 300">
                LARAVOLT
            </h1>
            <div class="ui divider"></div>
            <h2 class="ui inverted header" style=" font-weight: 300">
                Skeleton aplikasi untuk membangun Sistem Informasi atau website.
                <br>
                <small>Fitur standard biar kami yang urus, kamu fokus coding yang susah-susah saja.</small>
                <br>
                <br>
                <br>
                <small>"Pakai Laravolt, 2 minggu jadi."</small>
            </h2>
            <h3 class="ui header purple">Jokovvi <br>
                <small>Presiden Republik Eendonesia</small>
            </h3>

        </div>
    </div>

    <div class="ui divider section hidden"></div>

    <div class="ui container">

        <h2 class="ui header dividing centered">Ada Apa Aja Sih?</h2>
        <div class="ui container text center aligned">
            Laravolt adalah sekumpulan <code>UI Pattern</code> yang sering kita jumpai dalam sebuah sistem informasi.
            Dibangun diatas <a href="">Semantic UI</a>, Laravolt menjanjikan tampilan aplikasi web yang menarik
            dan konsisten untuk semua komponen, <strong>dengan minimal effort</strong>.
        </div>

        <div class="ui divider hidden"></div>
        <h4 class="ui header centered" style="text-transform: uppercase">Platform yang tesedia:</h4>
        <div class="ui divider hidden"></div>

        <div class="ui cards four item">
            <a href="" class="ui card">
                <div class="content" style="text-align: center; padding: 2rem">
                    <h3 class="header">HTML</h3>
                    <div class="description">Template HTML yang bisa kamu copy paste untuk dipakai sesuai kebutuhan.</div>
                </div>
                <div class="extra content">
                    <div class="meta">Ready</div>
                </div>
            </a>
            <a href="" class="ui card">
                <div class="content" style="text-align: center; padding: 2rem">
                    <h3 class="header">LARAVEL</h3>
                    <div class="description">Laravel sendiri sudah mengagumkan, ditambah Laravolt menjadikannya semakin luar biasa.</div>
                </div>
                <div class="extra content">
                    <div class="meta">Beta</div>
                </div>
            </a>
            <a href="" class="ui card">
                <div class="content" style="text-align: center; padding: 2rem">
                    <h3 class="header">GRAILS</h3>
                    <div class="description">Sedikit tidak mainstream, tapi Grails menjanjikan performa yang bagus untuk aplikasi web yang kamu bikin.</div>
                </div>
                <div class="extra content">
                    <div class="meta">Coming soon...</div>
                </div>
            </a>
            <a href="" class="ui card">
                <div class="content" style="text-align: center; padding: 2rem">
                    <h3 class="header">NODE JS</h3>
                    <div class="description">Biar kekinian dan ga kalah gaul sama teman-teman programmermu.</div>
                </div>
                <div class="extra content">
                    <div class="meta">Coming soon...</div>
                </div>
            </a>
        </div>
    </div>

    <div class="ui divider section hidden"></div>

    <div class="ui segment basic center aligned">
        <a href="{{ url('etalase/login') }}" class="ui button massive purple">Demo Aplikasi</a>
    </div>

    <div class="ui divider section hidden"></div>
    <div class="ui divider section hidden"></div>
    <div class="ui divider section hidden"></div>

    <div class="ui divider"></div>
    <div class="ui segment basic center aligned">
        Laravolt dikembangkan oleh <a href="https://javan.co.id">PT Javan Cipta Solusi</a>.
        Tidak ada hak cipta, silakan dipakai sesuka <i class="icon heart"></i>, ketagihan ditanggung sendiri.
    </div>
@endsection
