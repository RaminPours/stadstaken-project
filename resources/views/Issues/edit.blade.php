<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melding bewerken</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#FDFDFC] dark:bg-[#c79f9f] text-[#f80000] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight"> Melding bewerken</h1>

<form action="{{ route('issues.update', $issue->id) }}" 
      method="POST">
    
    @csrf
    @method('PUT')

    <div>
        <label for="titel">Titel:</label>
        <input type="text" 
               name="titel" 
               id="titel" 
               value="{{ old('titel', $issue->titel) }}"
               class="border border-gray-300 rounded-md p-2 w-full"
               >
    </div>

    <div>
        <label for="beschrijving">Beschrijving:</label>
        <textarea name="beschrijving" 
                  id="beschrijving" 
                  class="border border-gray-300 rounded-md p-2 w-full">{{ old('beschrijving', $issue->beschrijving) }}</textarea>
    </div>

    <div>
        <label for="locatie">Locatie:</label>
        <input type="text" 
               name="locatie" 
               id="locatie" 
               value="{{ old('locatie', $issue->locatie) }}"
               class="border border-gray-300 rounded-md p-2 w-full"
               >
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" class="border border-gray-300 rounded-md p-2 w-full">
            <option value="open" {{ $issue->status === 'open' ? 'selected' : '' }}>Open</option>
            <option value="in behandeling" {{ $issue->status === 'in_behandeling' ? 'selected' : '' }}>In Behandeling</option>
            <option value="verwerkt" {{ $issue->status === 'verwerkt' ? 'selected' : '' }}>Verwerkt</option>
        </select>
    </div>

    <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            > Wijziging opslaan</button>
    
    <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            > 
            <a href="{{ route('issues.index') }}">Annuleren</a></button>
</form>

</body>
</html>