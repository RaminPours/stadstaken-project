<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Melding bewerken</h1>

<form action="{{ route('issues.update', $issue->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" value="{{ old('titel', $issue->titel) }}">
    </div>

    <div>
        <label for="beschrijving">Beschrijving:</label>
        <textarea name="beschrijving" id="beschrijving">{{ old('beschrijving', $issue->beschrijving) }}</textarea>
    </div>

    <div>
        <label for="locatie">Locatie:</label>
        <input type="text" name="locatie" id="locatie" value="{{ old('locatie', $issue->locatie) }}">
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="open" {{ $issue->status === 'open' ? 'selected' : '' }}>Open</option>
            <option value="in behandeling" {{ $issue->status === 'in_behandeling' ? 'selected' : '' }}>In Behandeling</option>
            <option value="verwerkt" {{ $issue->status === 'verwerkt' ? 'selected' : '' }}>Verwerkt</option>
        </select>
    </div>

    <button type="submit"> Wijziging opslaan</button>
</form>

</body>
</html>