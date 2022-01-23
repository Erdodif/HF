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
                        <a title="Megoldás megtekintése" target="megoldasnezegeto" class="megtekintes" href="{{ route('solutions.show', ['solution'=>$solution]) }}">
                            <button>
                                Megtekintés
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">
                    <iframe name="megoldasnezegeto" class="nezegeto" src="{{ route('solutions.create',['assignment'=>$solutions[0]->assignment_id]) }}" frameborder="0"></iframe>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
