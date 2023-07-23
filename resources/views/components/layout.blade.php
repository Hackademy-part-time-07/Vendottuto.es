<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/globalstyles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <title>{{ $title ?? 'vendotutto'}}</title>
    @livewireStyles
    @vite(['resources/css/app.css'])
    {{ $style ??'' }}
</head>
<body>
    <x-navbar/>
    @if (session()->has('message'))
    <x-alert :type="session('message')['type']" :message="session('message')['text']" />
    @endif

    {{ $slot }}
    <x-footer/>
    
    @livewireScripts
    @vite(['resources/js/app.js'])
    {{ $script ??''}}
</body>
</html>
</div>