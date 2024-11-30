<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
   {{--  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" /> --}}

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" /> --}}

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

    <script src="https://kit.fontawesome.com/4f9450e469.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
