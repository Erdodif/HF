<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megoldások</title>
    <link rel="stylesheet" href="{{ URL::asset('css/solutions/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/solutions/create.css') }}">
</head>
<body>
    <div>
        <h2>
            Új megoldás hozzáadása
        </h2>
        <form  method="POST" class="assignment" action="{{ route('solutions.update',['solution'=>$solution]) }}" target="_self">
        @csrf
        @method('PUT')
            <input type="hidden" name="assignment_id" value="{{ $solution->assignment_id }}">
            <input type="hidden" name="user_id" value="{{ $solution->user_id }}">
            <table>
                <tbody>
                    <tr>
                        <th>Link</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <input type="text" id="link" name="link" placeholder="Megoldási link" value="{{ $solution->link }}">
                                @error('link')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <button type="submit">
                                Mentés
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
