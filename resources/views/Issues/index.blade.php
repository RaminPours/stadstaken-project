<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
     @vite('resources/css/app.css')
</head>
<body>
    
<h1>Alle meldingen</h1>
<p>Klik op de melding voor meer informatie</p>

    <ul>
        @foreach ($issues as $issue)
            <li>
                <a href="{{ route('issues.show', $issue->id) }}">{{ $issue->titel }}</a>
            
            </li>
        @endforeach
    </ul>

    <p><a href="{{ route('issues.create') }}">Nieuwe melding maken</a></p>
    
</body>
    
</body>
</html>