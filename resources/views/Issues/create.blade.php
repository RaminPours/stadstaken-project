<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<h1>Nieuwe melding</h1>

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
        <input type="text" name="titel" id="titel" value="" required>
    </div>
    <div>
        <label for="beschrijving">Beschrijving:</label>
        <textarea name="beschrijving" id="beschrijving" required></textarea>
    </div>
    <div>
        <label for="locatie">Locatie:</label>
        <input type="text" name="locatie" id="locatie" required>
    </div>
    <button type="submit">Melding indienen</button>
</form>
</body>
</html>