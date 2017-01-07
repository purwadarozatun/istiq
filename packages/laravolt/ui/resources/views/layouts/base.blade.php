<!DOCTYPE html>
<html>
<head>
    <title>@yield('site.title', "Welcome Home") | {{ config('app.name') }}</title>

    <meta charset="UTF-8"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="{{ elixir('dist/all.css') }}"/>
    <style>
        a.link {color: #4183C4 !important;}
    </style>
    @stack('head')

</head>

<body id="@yield('page.id')">

@yield('body')

<script type="text/javascript" src="{{ elixir('dist/all.js') }}"></script>

@stack('body')

</body>
</html>
