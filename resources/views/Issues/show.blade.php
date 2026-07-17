<x-app-layout>
    <x-slot 
        name="title"
        >{{ $issue->titel }}
    </x-slot>
    <div 
        class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
        <a 
            href="{{ route('issues.index') }}" 
            class="mb-6 inline-flex items-center gap-2 text-sm font-bold text-slate-600 hover:text-emerald-700"
            >← Terug naar meldingen
        </a>

        <div 
            class="grid gap-6 lg:grid-cols-[1fr_280px]">
            <article 
                class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-9">
                <div 
                    class="flex flex-wrap items-center gap-3">
                    <span 
                        class="rounded-full px-3 py-1 text-xs font-bold {{ $issue->status === 'open' ? 'bg-amber-100 text-amber-800' : ($issue->status === 'verwerkt' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800') }}"
                        >{{ ucfirst($issue->status) }}
                    </span>
                    <span 
                        class="text-sm font-semibold text-slate-400"
                        >Melding #{{ $issue->id }}
                    </span>
                </div>
                <h1 
                    class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900"
                    >{{ $issue->titel }}
                </h1>
                <div 
                    class="mt-7 rounded-2xl bg-slate-50 p-5"><p class="text-xs font-bold uppercase tracking-wider text-slate-500"
                    >Beschrijving
                </p>
                <p 
                    class="mt-3 whitespace-pre-line leading-7 text-slate-700"
                    >{{ $issue->beschrijving }}
                </p>
            </div>
                <div 
                    class="mt-6 flex items-start gap-3 border-t border-slate-100 pt-6">
                    <span 
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100"
                        >📍
                    </span>
                    <div>
                        <p 
                            class="text-xs font-bold uppercase tracking-wider text-slate-500"
                            >Locatie
                        </p>
                        <p 
                            class="mt-1 font-bold text-slate-900"
                            >{{ $issue->locatie }}
                        </p>
                    </div>
                </div>
            </article>

            <aside 
                class="space-y-5">
                <div 
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p 
                        class="text-xs font-bold uppercase tracking-wider text-slate-500"
                        >Ingediend door
                    </p>
                    <p 
                        class="mt-2 font-bold text-slate-900"
                        >{{ $issue->user->name }}
                    </p>
                    <p 
                        class="mt-1 text-sm text-slate-500"
                        >{{ $issue->created_at->format('d-m-Y \o\m H:i') }}
                    </p>
                </div>

                @if (Auth::id() === $issue->user_id || in_array(Auth::user()->role, ['medewerker', 'admin']))
                    <div 
                        class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <p 
                            class="mb-4 text-sm font-bold text-slate-900"
                            >Melding beheren
                        </p>
                        <a 
                            href="{{ route('issues.edit', $issue) }}" 
                            class="btn-secondary w-full"
                            >Melding bewerken
                        </a>
                        <form 
                            action="{{ route('issues.destroy', $issue) }}" 
                            method="POST" 
                            class="mt-3" 
                            onsubmit="return 
                            confirm('Weet je zeker dat je deze melding wilt verwijderen?')"
                            >@csrf 
                            @method('DELETE')
                            <button 
                                class="w-full rounded-xl px-4 py-3 text-sm font-bold text-red-600 transition hover:bg-red-50"
                                >Melding verwijderen
                            </button>
                        </form>
                    </div>
                @endif

                <a 
                    href="{{ route('issues.create') }}" 
                    class="btn-primary w-full"
                    >+ Nieuwe melding
                </a>
            </aside>
        </div>
    </div>
</x-app-layout>
