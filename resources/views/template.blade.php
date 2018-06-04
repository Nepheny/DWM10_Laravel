<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }} : @yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/base.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    </head>
    <body class="no-padding-margin">
        <header>
            @include('parts/header')
        </header>
        <main>
            <aside>
                @include('parts/aside')
            </aside>
            <section>
                @yield('content')
                <footer>
                    @include('parts/footer')
                </footer>
            </section>
        </main>
    </body>
</html>