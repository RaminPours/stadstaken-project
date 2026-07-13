<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#c79f9f] text-[#f80000] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

<h1 class="font-semibold text-xl text-gray-800 leading-tight">Alle meldingen</h1>
<br>
<p>Klik op de melding voor meer informatie</p>
    <ul>
        @foreach ($issues as $issue)
            <li class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <a href="{{ route('issues.show', $issue->id) }}">{{ $issue->titel }} </a>
            
            </li>
        @endforeach
    </ul>
    <br>
    <p class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"><a href="{{ route('issues.create') }}">Nieuwe melding maken</a></p>
    
</div>

</body>
    
</body>
</html>