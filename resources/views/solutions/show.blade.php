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
        @if(!$solution->hasResponse())
        <form method="POST" action="{{ route('responses.store') }}" target="_self">
            @csrf
            <input type="hidden" name="solution_id" value="{{$solution->id}}">
            <table>
                <caption>
                    Visszajelzés írása
                </caption>
                <tr>
                    <th>
                        Szöveg
                    </th>
                    @if($solution->assignment()->hasPoints())
                    <th>
                        Pontszám
                    </th>
                    @endif
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="text" id="points" placeholder="Leírás">
                    </td>
                    @if($solution->assignment()->hasPoints())
                    <td>
                        <input type="number" name="points" id="points" placeholder="pontszám">
                    </td>
                    @endif
                    <td>
                        <button type="submit">
                            Visszajelzés küldése
                        </button>
                    </td>
                </tr>
            </table>
        </form>
        @else
            <h1>Tanár visszajelzése</h1>
            <p>{{$solution->response()->text}}</p>
            @if($solution->assignment()->hasPoints())
            <p>{{$solution->response()->points}} / {{$solution->assignment()->max_points}}</p>
            @endif
            <form method="POST" action="{{ route('responses.destroy',['response'=>$solution->response()]) }}" target="_self">
                @csrf
                @method("DELETE")
                <button type="submit">
                    Visszajelzés törlése
                </button>
            </form>
        @endif
    </div>
</body>
</html>
