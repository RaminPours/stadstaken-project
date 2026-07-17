<x-app-layout>
    <x-slot 
            name="title"
             >Dashboard
    </x-slot>
    <div 
        class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <section 
                class="relative overflow-hidden rounded-3xl bg-slate-900 px-6 py-10 text-white shadow-xl sm:px-10">
            <div 
                class="absolute -right-16 -top-20 h-64 w-64 rounded-full bg-emerald-500/20 blur-3xl">
            </div>
            <div 
                class="relative max-w-2xl">
                <p 
                    class="mb-3 text-sm font-bold uppercase tracking-widest text-emerald-500"
                    >Welkom terug, {{  }} 👀
                </p>
                <h1 
                    class="text-3xl font-extrabold tracking-tight sm:text-4xl"
                    >Samen houden we de stad prettig en veilig. 😎
                </h1>
                <p 
                    class="mt-4 max-w-xl text-slate-300"
                    >Meld een probleem in je buurt en volg eenvoudig wat ermee gebeurt.
                </p>
                <a 
                    href="{{ route('issues.create') }}" 
                    class="mt-7 inline-flex rounded-xl bg-emerald-500 px-5 py-3 font-bold text-white transition hover:bg-emerald-400"
                    >Nieuwe melding maken →
                </a>
            </div>
        </section>

        <section 
                class="mt-8 grid gap-4 sm:grid-cols-3">
            @foreach ([['label' => 'Mijn meldingen', 'value' => $totalIssues, 'color' => 'text-slate-900'], ['label' => 'Nog open', 'value' => $openIssues, 'color' => 'text-amber-600'], ['label' => 'Afgerond', 'value' => $completedIssues, 'color' => 'text-emerald-600']] as $stat)
                <div 
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p 
                        class="text-sm font-semibold text-slate-500">{{ $stat['label'] }}
                    </p>
                    <p 
                        class="mt-2 text-3xl font-extrabold {{ $stat['color'] }}">{{ $stat['value'] }}
                    </p>
                </div>
            @endforeach
        </section>

        <section 
                class="mt-10">
            <div 
                class="mb-4 flex items-end justify-between">
            <div>
            <p 
                class="text-sm font-bold uppercase tracking-wider text-emerald-600"
                >Overzicht
            </p>
            <h2 
                class="text-2xl font-bold text-slate-900"
                >Je laatste meldingen
            </h2>
            </div>
            <a 
                href="{{ route('issues.index') }}" 
                class="text-sm font-bold text-emerald-700 hover:text-emerald-800"
                >Alles bekijken →
            </a>
            </div>
            <div 
                class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                @forelse ($recentIssues as $issue)
                    <a 
                        href="{{ route('issues.show', $issue) }}" 
                        class="flex items-center justify-between gap-4 border-b border-slate-100 px-5 py-4 last:border-0 hover:bg-slate-50">
                    <div>
                    <p 
                        class="font-bold text-slate-900">{{ $issue->titel }}
                    </p>
                    <p 
                        class="mt-1 text-sm text-slate-500">{{ $issue->locatie }} · {{ $issue->created_at->diffForHumans() }}
                    </p>
                    </div>
                        <span 
                            class="shrink-0 rounded-full px-3 py-1 text-xs font-bold {{ $issue->status === 'open' ? 'bg-amber-100 text-amber-800' : ($issue->status === 'verwerkt' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800') }}"
                            >{{ ucfirst($issue->status) }}
                        </span>
                    </a>
                @empty
                    <div class="px-6 py-12 text-center"><p class="font-semibold text-slate-700"
                        >Je hebt nog geen meldingen.
                    </p>
                    <a 
                        href="{{ route('issues.create') }}" 
                        class="mt-2 inline-block text-sm font-bold text-emerald-700"
                        >Maak je eerste melding
                    </a>
                    </div>
                @endforelse
            </div>
        </section>
    </div>
</x-app-layout>
