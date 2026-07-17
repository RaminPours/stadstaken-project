<x-app-layout>
    <x-slot name="title">Meldingen</x-slot>
    <x-slot name="header"><div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"><div><p class="text-sm font-bold uppercase tracking-wider text-emerald-600">Stadsoverzicht</p><h1 class="mt-1 text-3xl font-extrabold text-slate-900">Alle meldingen</h1><p class="mt-2 text-slate-500">Bekijk wat er speelt in de buurt en volg de voortgang.</p></div><a href="{{ route('issues.create') }}" class="btn-primary">+ Nieuwe melding</a></div></x-slot>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
            @foreach ([['label' => 'Totaal', 'value' => $counts['totaal'], 'style' => 'text-slate-900'], ['label' => 'Open', 'value' => $counts['open'], 'style' => 'text-amber-600'], ['label' => 'In behandeling', 'value' => $counts['in_behandeling'], 'style' => 'text-blue-600'], ['label' => 'Verwerkt', 'value' => $counts['verwerkt'], 'style' => 'text-emerald-600']] as $stat)
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-wider text-slate-500">{{ $stat['label'] }}</p><p class="mt-1 text-2xl font-extrabold {{ $stat['style'] }}">{{ $stat['value'] }}</p></div>
            @endforeach
        </div>

        <form method="GET" action="{{ route('issues.index') }}" class="mt-7 flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:flex-row">
            <div class="relative flex-1"><span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">⌕</span><input name="zoeken" value="{{ request('zoeken') }}" class="form-input !pl-10" placeholder="Zoek op titel of locatie..."></div>
            <select name="status" class="form-input sm:w-52"><option value="">Alle statussen</option><option value="open" @selected(request('status') === 'open')>Open</option><option value="in behandeling" @selected(request('status') === 'in behandeling')>In behandeling</option><option value="verwerkt" @selected(request('status') === 'verwerkt')>Verwerkt</option></select>
            <button class="btn-primary">Filteren</button>
            @if(request()->hasAny(['zoeken', 'status']))<a href="{{ route('issues.index') }}" class="btn-secondary">Wissen</a>@endif
        </form>

        <div class="mt-6 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($issues as $issue)
                <a href="{{ route('issues.show', $issue) }}" class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-emerald-300 hover:shadow-lg">
                    <div class="flex items-start justify-between gap-3"><span class="rounded-full px-3 py-1 text-xs font-bold {{ $issue->status === 'open' ? 'bg-amber-100 text-amber-800' : ($issue->status === 'verwerkt' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800') }}">{{ ucfirst($issue->status) }}</span><span class="text-xs font-semibold text-slate-400">#{{ $issue->id }}</span></div>
                    <h2 class="mt-5 text-lg font-extrabold text-slate-900 group-hover:text-emerald-700">{{ $issue->titel }}</h2>
                    <p class="mt-2 line-clamp-2 flex-1 text-sm leading-6 text-slate-600">{{ $issue->beschrijving }}</p>
                    <div class="mt-5 border-t border-slate-100 pt-4 text-sm text-slate-500"><p class="font-semibold text-slate-700">📍 {{ $issue->locatie }}</p><p class="mt-2 text-xs">{{ $issue->created_at->format('d-m-Y') }} · door {{ $issue->user->name }}</p></div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center"><p class="text-lg font-bold text-slate-800">Geen meldingen gevonden</p><p class="mt-2 text-sm text-slate-500">Probeer andere filters of maak een nieuwe melding.</p></div>
            @endforelse
        </div>
        <div class="mt-8">{{ $issues->links() }}</div>
    </div>
</x-app-layout>
