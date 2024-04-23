<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Daily Task Planner</title>
    @yield('styles')

</head>

<body>

    <h1>
        @yield('title')
    </h1>


    <div>

        @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>

        @endif
        @yield('content')
    </div>
</body>

</html>