<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Poznámky</title>
</head>
<body>
    <h1>Poznámky</h1>
    <ul>
        @foreach($notes as $note)
            <li>
                <strong>ID:</strong> {{ $note->id }}<br>
                <strong>Krátká poznámka:</strong> {{ $note->shortNote }}<br>
                <strong>Dlouhá poznámka:</strong> {{ $note->longNote }}
            </li>
        @endforeach
    </ul>

</body>
</html>
