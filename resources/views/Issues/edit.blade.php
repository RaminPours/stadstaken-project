<x-app-layout>
    <x-slot name="title">Melding bewerken</x-slot>
    <x-slot name="header"><p class="text-sm font-bold uppercase tracking-wider text-emerald-600">Melding #{{ $issue->id }}</p><h1 class="mt-1 text-2xl font-extrabold text-slate-900">Melding bewerken</h1></x-slot>
    <div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <form action="{{ route('issues.update', $issue) }}" method="POST" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">@csrf @method('PUT') @include('issues._form', ['buttonText' => 'Wijzigingen opslaan'])</form>
    </div>
</x-app-layout>
