<!-- resources/views/pdf/document.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>PDF Document</h1>
    
    <!-- Image -->
    <img src="{{ public_path('img/doge-foto.jpg') }}" alt="Sample Image"> <!-- Ensure the image path is correct -->

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Země</th>
                <th>Váha</th>
                <th>Výška</th>
                <th>Datum Narození</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['first_name'] }}</td>
                    <td>{{ $item['last_name'] }}</td>
                    <td>{{ $item['country'] }}</td>
                    <td>{{ $item['weight'] }}</td>
                    <td>{{ $item['height'] }}</td>
                    <td>{{ $item['date_of_birth'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Additional Content -->
    <p>LOL</p>
</body>
</html>
