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
                <th>Krátká poznámka</th>
                <th>Dlouhá poznámka</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['shortNote'] }}</td>
                    <td>{{ $item['longNote'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Additional Content -->
    <p>LOL</p>
</body>
</html>
