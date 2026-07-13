<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nieuwe melding</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-[#FDFDFC] dark:bg-[#c79f9f] text-[#f80000] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    
<h1 class="font-semibold text-xl text-gray-800 leading-tight">Nieuwe melding</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('issues.store') }}" method="POST">
    @csrf
    <div>
        <label for="titel" >Titel:</label>
        <input type="text" 
               name="titel" 
               id="titel" 
               value="" 
               class="border border-gray-300 rounded-md p-2 w-full"
               required>
    </div>
    <br>
    <div>
        <label for="locatie">Locatie:</label>
        <input type="text" 
               name="locatie" 
               id="locatie" 
               class="border border-gray-300 rounded-md p-2 w-full"
               required>
    </div>
    <br>
    <div>
        <label for="beschrijving">Beschrijving:</label>
        <textarea name="beschrijving" 
                  id="beschrijving" 
                  class="border border-gray-300 rounded-md p-2 w-full"
                  required></textarea>
    </div>
    <br>
    <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            >Melding indienen</button>
</form>
</body>
</html>