<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welkom') }} {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hi, klik hieronder om alle meldingen te bekijken!") }}
                    <br><br>
                    <a href="{{ route('issues.index') }}" class="font-semibold text-xl text-gray-800 leading-tight">Bekijk alle meldingen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
