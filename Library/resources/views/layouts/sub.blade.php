<!doctype html>

<head>
    @component('components.head')
    @endcomponent
</head>

<body>
    <main class="main">
        <h1 class="main_title">@yield('title')</h1>
        @yield('content')
    </main>
</body>

</html>