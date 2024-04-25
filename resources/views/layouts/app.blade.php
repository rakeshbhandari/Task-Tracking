<!DOCTYPE html>

<html>

<head>

    <title>Daily Task Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @yield('styles')

</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg ">

    <h1 class="text-5xl mt-4 mb-4">
        @yield('title')
    </h1>


    <div>

        <!-- @if (session()->has('success')) -->
        <!-- <div>{{ session('success') }}</div> -->
        <!-- @endif -->

        <div class="mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700">
            <strong class="font-bold">Success!</strong>
            <div>This is a flash message.</div>
        </div>
        @yield('content')
    </div>
</body>

</html>