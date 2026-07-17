<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stadstaken · Samen voor de buurt</title>
    <link rel="preconnect" href="https://fonts.bunny.net"><link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body 
    class="font-sans antialiased">
    <div 
        class="min-h-screen overflow-hidden bg-slate-950 text-white">
        <nav 
            class="mx-auto flex max-w-7xl items-center justify-between px-5 py-6 sm:px-8">
            <a 
                href="/" 
                class="flex items-center gap-3">
            <span 
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500 font-extrabold"
                >S
            </span>
            <span 
                class="text-lg font-extrabold"
                >Stadstaken
            </span>
            </a>
            <div 
                class="flex items-center gap-3">
            @auth
            <a 
                href="{{ route('dashboard') }}" 
                class="rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-slate-900"
                >Dashboard
            </a>
            @else
            <a 
                href="{{ route('login') }}" 
                class="px-3 py-2 text-sm font-bold text-slate-200 hover:text-white"
                >Inloggen
            </a>
            <a 
                href="{{ route('register') }}" 
                class="rounded-xl bg-emerald-500 px-4 py-2.5 text-sm font-bold hover:bg-emerald-400"
                >Registreren
            </a>
            @endauth
        </div>
        </nav>

        <main 
            class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 lg:grid-cols-2 lg:py-28">
            <div 
                class="absolute left-1/2 top-1/2 -z-0 h-96 w-96 rounded-full bg-emerald-500/10 blur-3xl"
                >
            </div>
            <div 
                class="relative z-10">
            <span 
                class="inline-flex rounded-full border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-sm font-bold text-emerald-400"
                >Samen houden wij de stad beter😎
            </span>
            <h1 
                class="mt-7 text-5xl font-extrabold leading-tight tracking-tight sm:text-6xl"
                >Een probleem gezien?
                <br>
            <span 
                class="text-emerald-400"
                >Meld het eenvoudig.
            </span>
            </h1>
            <p 
                class="mt-6 max-w-xl text-lg leading-8 text-slate-300"
                >Van een kapotte lantaarn tot zwerfafval. Geef het door, volg de status en help mee aan een fijne en veilige buurt.
            </p>
            <div 
                class="mt-9 flex flex-col gap-3 sm:flex-row"
                >@auth
            <a 
                href="{{ route('issues.create') }}" 
                class="btn-primary !bg-emerald-500 !px-6 !py-3.5"
                >Nieuwe melding maken →
            </a>
                @else
            <a 
                href="{{ route('register') }}" 
                class="btn-primary !bg-emerald-500 !px-6 !py-3.5"
                >Begin met melden →
            </a>
            <a 
                href="{{ route('login') }}" 
                class="rounded-xl border border-slate-700 px-6 py-3.5 text-center font-bold hover:bg-slate-800"
                >Ik heb al een account
            </a>
                @endauth
            </div>
            </div>
            <div 
                class="relative z-10 hidden lg:block">
            <div 
                class="rotate-3 rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl backdrop-blur"
                >
            <div 
                class="rounded-2xl bg-white p-6 text-slate-900">
            <div 
                class="flex items-center justify-between">
            <span 
                class="rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-800"
                >Open
            </span>
            <span 
                class="text-xs font-bold text-slate-400"
                >#1042
            </span>
        </div>
        <h2 
                class="mt-5 text-xl font-extrabold"
                >Straatverlichting werkt niet
        </h2>
            <p 
                class="mt-2 leading-6 text-slate-600"
                >De lantaarnpaal bij het zebrapad is al enkele dagen defect‼😭
            </p>
            <div 
                class="mt-5 border-t border-slate-100 pt-4 font-semibold text-slate-600"
                >📍 Parklaan, bij nummer 28
            </div>
            </div>
            <div 
                class="mt-4 grid grid-cols-3 gap-3 text-center">
            <div 
                class="rounded-xl bg-white/10 p-3">
            <strong 
                class="block text-xl"
                >24
            </strong>
            <small 
                class="text-slate-400"
                >Open
            </small>
        </div>
        <div 
                class="rounded-xl bg-white/10 p-3"
            >
            <strong 
                class="block text-xl text-blue-300"
                >12
            </strong>
            <small 
                class="text-slate-400"
                >Bezig
            </small>
        </div>
        <div 
                class="rounded-xl bg-white/10 p-3">
            <strong 
                class="block text-xl text-emerald-300"
                >86
            </strong>
            <small 
                class="text-slate-400"
                >Klaar
            </small>
        </div>
    </div>
</div>
</div>
        </main>
    </div>
</body>
</html>
