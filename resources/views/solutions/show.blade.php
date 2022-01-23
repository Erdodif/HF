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
            <tr>
                <td>{{ $solution->user()->name }}</td>
                <td>{{ $solution->link }}</td>
                <td>{{ $solution->created_at }}</td>
                <td>{{ $solution->updated_at }}</td>
                <td>
                    <a title="Szerkesztés" target="_self" href="{{ route('solutions.edit', ['solution'=>$solution]) }}">
                        <button>
                            Szerkesztés
                        </button>
                    </a>
                    <form method="POST" action="{{ route('solutions.destroy', ['solution'=>$solution]) }}" target="_parent">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            Törlés
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
