<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megoldások</title>
    <link rel="stylesheet" href="{{ URL::asset('css/solutions/index.css') }}">
</head>
<body>
    <div>
        <h1>
            {{ $solutions->first()->assignment()->title }}
        </h1>
        <span>
            {{ $solutions->count() }} megoldás érkezett erre a feladatra
        </span>
        <div>
            <a title="Megoldás feltöltése" href="{{ route('solutions.create') }}">
                <button>
                    Megoldás Feltöltése
                </button>
            </a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Küldő</th>
                    <th>Link</th>
                    <th>Leadás ideje</th>
                    <th>Utolsó módosítás</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
            @foreach($solutions as $solution)
                <tr>
                    <td>{{ $solution->user()->name }}</td>
                    <td>{{ $solution->link }}</td>
                    <td>{{ $solution->created_at }}</td>
                    <td>{{ $solution->updated_at }}</td>
                    <td>
                        <a title="Megoldás megtekintése" href="{{ route('solutions.show', ['solution'=>$solution]) }}">
                            <button>
                                Megtekintés
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
