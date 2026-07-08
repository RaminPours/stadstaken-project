<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1> Melding informatie</h1>

<p><strong>Titel:</strong> {{ $issue->titel }}</p>
<p><strong>Beschrijving:</strong> {{ $issue->beschrijving }}</p>
<p><strong>Locatie:</strong> {{ $issue->locatie }}</p>
<p><strong>Status:</strong> {{ $issue->status }}</p>

<a href="{{ route('issues.index') }}">Terug naar Meldingen</a>
<p>Wil je nog een melding maken? <a href="{{ route('issues.create') }}">Klik hier</a></p>

<p> melding bewerken <a href="{{ route('issues.edit', $issue->id) }}">Klik hier</a> </p>
 
</body>
</html>