<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melding informatie</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-[#FDFDFC] dark:bg-[#c79f9f] text-[#f80000] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
   <h1 class="font-semibold text-xl text-gray-800 leading-tight"> Melding informatie</h1>
<br>
<p><strong>Titel:</strong> {{ $issue->titel }}</p>
<p><strong>Beschrijving:</strong> {{ $issue->beschrijving }}</p>
<p><strong>Locatie:</strong> {{ $issue->locatie }}</p>
<p><strong>Status:</strong> {{ $issue->status }}</p>

<a href="{{ route('issues.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Terug naar Meldingen</a>
<hr>
<p class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Wil je nog een melding maken? <a href="{{ route('issues.create') }}">Klik hier</a></p>
<hr>
<p class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"> melding bewerken <a href="{{ route('issues.edit', $issue->id) }}">Klik hier</a> </p>
   
<form action="{{ route('issues.destroy', $issue->id) }}" method="POST">
    @csrf
    @method('DELETE')
      <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Melding verwijderen</button>
    </form>
</body>
</html>