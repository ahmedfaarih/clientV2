<!DOCTYPE html>
<html>
    <head>
        @include('layouts.head')
    </head>
<body>
    <header>
        @include('layouts.header')
    </header>
    <main>
        @yield('content')
    </main>

    <footer id="footer">
        @include('layouts.footer')
    </footer>

</body>
</html>