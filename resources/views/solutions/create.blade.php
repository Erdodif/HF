<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php

use App\Models\Assignment;
use App\Models\User;

$people = $assignment->assignedUsers();
$missing = $assignment->missing();
?>
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
        @if($missing->count()==0)
        <div>
            Már minden érintett tanuló leadta a feladatot!
        </div>
        @else
        <form  method="POST" class="assignment" action="{{ route('solutions.store') }}" target="_self">
        @csrf
            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
            <table>
                <tbody>
                    <tr>
                        <th>Küldő</th>
                        <th>Link</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <select name="user_id" id="user_id">
                                @foreach($missing as $person)
                                    <option value="{{ $person->id }}">
                                        {{ $person->id.' - '.$person->name }}
                                    </option>
                                @endforeach
                                </select>
                                @error('user_id')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div>
                                <input type="text" id="link" name="link" placeholder="Megoldási link">
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
        @endif
    </div>
</body>
</html>
