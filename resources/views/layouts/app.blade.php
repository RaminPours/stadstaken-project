<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' · ' : '' }}Stadstaken</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-50">
        @include('layouts.navigation')

        @isset($header)
            <header class="border-b border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-7 sm:px-6 lg:px-8">{{ $header }}</div>
            </header>
        @endisset

        @if (session('success'))
            <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-600 text-white">✓</span>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <main>{{ $slot }}</main>
    </div>
</body>
</html>
