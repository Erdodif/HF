<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Művelet</title>
    <link rel="stylesheet" href="{{ URL::asset('css/solutions/index.css') }}">
    <script>
        setTimeout(function(){
            window.parent.location.href = `{{ route('solutions.index',['assignment' =>$assignment]) }}`
        },3000);
    </script>
</head>
<body>
    <h1>Sikeres Mentés</h1>
</body>
</html>
