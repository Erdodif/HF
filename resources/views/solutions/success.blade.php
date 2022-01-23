<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="refresh" content="3, URL={{ route('solutions.create',['assignment' =>$assignment]) }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Művelet</title>
    <link rel="stylesheet" href="{{ URL::asset('css/solutions/index.css') }}">
</head>
<body>
    <h1>Sikeres Mentés</h1>
</body>
</html>
