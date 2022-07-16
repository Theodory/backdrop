<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') ?? 'Smart Tech Inc.' }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    @yield('styles')
</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    @include('components.nav-link')

   @yield('content')

   @yield('scripts')

</html>
