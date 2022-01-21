<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feladatok</title>
    <link rel="stylesheet" href="{{ URL::asset('css/assignments/index.css') }}">
</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Küldő</th>
                    <th>Osztály</th>
                    <th>Cím</th>
                    <th>Határidő</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->owner()->name }}</td>
                    <td>{{ $assignment->getClass()->name }}</td>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->due }}</td>
                    <td>
                        <a title="Feladat megtekintése" target="megtekinto" href="{{ route('assignments.show', ['assignment'=>$assignment]) }}">
                            <button>
                                Megtekintés
                            </button>
                        </a>
                        <a title="Megoldások megtekintése" target="megtekinto" href="{{ route('solutions.index', ['assignment'=>$assignment]) }}">
                            <button>
                                Megoldások
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a target="megtekinto" href="{{ route('assignments.create') }}">
        <button>
            Új feladat
        </button>
    </a>
    <div class="nezegeto">
        <iframe style="width:100%; height:100%;" src="{{ route('frame.index') }}" frameborder="0" name="megtekinto" id="megtekinto"></iframe>
    </div>
</body>
</html>
