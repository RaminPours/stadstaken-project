<x-app-layout>
    <x-slot 
        name="title"
        >Nieuwe melding
    </x-slot>

    <x-slot 
        name="header">
        <p 
            class="text-sm font-bold uppercase tracking-wider text-emerald-600"
            >Melding doorgeven
        </p>
        <h1 
            class="mt-1 text-2xl font-extrabold text-slate-900"
            >Wat is er aan de hand? 😥
        </h1>
        <p 
            class="mt-2 text-sm text-slate-500"
            >Vul de gegevens zo duidelijk mogelijk in. Zo kan de melding sneller worden opgepakt.
        </p>
    </x-slot>
    <div 
            class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <form 
            action="{{ route('issues.store') }}" 
            method="POST" 
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
            >
            @csrf 
            @include('issues._form', ['buttonText' => 'Melding indienen'])
        </form>
    </div>
</x-app-layout>
