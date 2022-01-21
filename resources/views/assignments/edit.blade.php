<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
    use App\Models\Classes;
    use App\Models\User;
    $classes = Classes::all();
    $people = User::all();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feladatok</title>
    <link rel="stylesheet" href="{{ URL::asset('css/assignments/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/assignments/edit.css') }}">
</head>
<body>
    <form class="assignment" action="{{ route('assignments.update',['assignment'=>$assignment]) }}">
        @csrf
        @method('PATCH')
        <div class="headers">
            <h1>
                <input type="text" class="h2" value="{{ $assignment->title }}"">
            </h1>
            <textarea class="description">
                {{ $assignment->description }}
            </textarea>
        </div>
        <div class="stats">
            <div>
                <div>
                    <span>Feladó:</span>
                    <select name="owner_id" id="owner_id">
                        @foreach($people as $person)
                            @if($assignment->owner_id == $person->id)
                            <option value="{{ $person->id }}" selected>
                                {{ $person->id.' - '.$person->name }}
                            </option>
                            @else
                            <option value="{{ $person->id }}">
                                {{ $person->id.' - '.$person->name }}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <span>Osztály:</span>
                    <select name="classes" id="classes">
                        @foreach($classes as $oneclass)
                            @if($assignment->class_id == $oneclass->id)
                                <option value="{{ $oneclass->id }}">
                                    {{ $oneclass->id.' - '.$oneclass->name }}
                                </option selected>
                            @else
                                <option value="{{ $oneclass->id }}">
                                    {{ $oneclass->id.' - '.$oneclass->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <span>Leadás Határidelye:</span>
                    <input type="date" value="{{ $assignment->due }}" name="due" id="last_due">
                </div>
                <div>
                    <span>Pótlás határideje:</span>
                    <input type="date" name="last_due" id="last_due">
                </div>
                <div>
                    <span>Nem lehet pótolni</span>
                    <input type="checkbox" name="null_last_due" id="null_last_due">
                </div>
            </div>
            <div>
                <a target="_parent" href="{{ route('assignments.index') }}">
                    <button type="button">
                        Mégse
                    </button>
                </a>
                <a target="_self" href="{{ route('assignments.update', ['assignment'=>$assignment]) }}">
                    <button type="submit">
                        Módosítás
                    </button>
                </a>
            </div>
        </div>
    </form>
</body>
</html>
