<nav x-data="{ open: false }" class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/90 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-18 items-center justify-between py-3">
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                    </span>
                    <span><strong class="block text-base leading-none text-slate-900">Stadstaken</strong><small class="text-xs text-slate-500">Samen voor de buurt</small></span>
                </a>

                <div class="hidden items-center gap-1 md:flex">
                    <a href="{{ route('dashboard') }}" class="rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Dashboard</a>
                    <a href="{{ route('issues.index') }}" class="rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('issues.*') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Meldingen</a>
                </div>
            </div>

            <div class="hidden items-center gap-3 md:flex">
                <a href="{{ route('issues.create') }}" class="btn-primary !px-4 !py-2.5">+ Nieuwe melding</a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white ring-2 ring-white hover:bg-slate-700">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="border-b border-slate-100 px-4 py-3"><p class="text-sm font-semibold text-slate-900">{{ Auth::user()->name }}</p><p class="truncate text-xs text-slate-500">{{ Auth::user()->email }}</p></div>
                        <x-dropdown-link :href="route('profile.edit')">Profiel</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">@csrf<x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</x-dropdown-link></form>
                    </x-slot>
                </x-dropdown>
            </div>

            <button @click="open = !open" class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 md:hidden" aria-label="Menu openen">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path x-show="!open" stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/><path x-show="open" stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <div x-show="open" x-transition class="border-t border-slate-200 bg-white p-4 md:hidden">
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}" class="block rounded-lg px-3 py-2 font-semibold text-slate-700">Dashboard</a>
            <a href="{{ route('issues.index') }}" class="block rounded-lg px-3 py-2 font-semibold text-slate-700">Meldingen</a>
            <a href="{{ route('issues.create') }}" class="mt-3 flex w-full justify-center btn-primary">Nieuwe melding</a>
            <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 font-semibold text-slate-700">Profiel</a>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="block w-full rounded-lg px-3 py-2 text-left font-semibold text-red-600">Uitloggen</button></form>
        </div>
    </div>
</nav>
