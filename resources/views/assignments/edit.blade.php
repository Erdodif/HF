<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
    use App\Models\Classes;
    use App\Models\User;
    $classes = Classes::all();
    $people = User::all();
    $dueDate = substr($assignment->due,0,10);
    $dueTime = substr($assignment->due,11,5);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feladat - Szerkesztés</title>
    <link rel="stylesheet" href="{{ URL::asset('css/assignments/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/assignments/edit.css') }}">
</head>
<body>
    <form method="POST" class="assignment" action="{{ route('assignments.update',['assignment'=>$assignment]) }}" target="_parent">
        @csrf
        @method('PUT')
        <div class="headers">
            <h1>
                <input type="text" class="h2" value="{{ $assignment->title }}" name="title" id="title" placeholder="Cím">
            </h1>
            @error('title')
            <div class="problem">
                {{ $message }}
            </div>
            @enderror
            <textarea class="description" name="description" id="description" placeholder="Leírás">
                {{ $assignment->description }}
            </textarea>
            @error('description')
            <div class="problem">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="stats">
            <div>
                <div>
                    <span>Feladó:</span>
                    <div>
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
                        @error('owner_id')
                        <div class="problem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <span>Osztály:</span>
                    <div>
                        <select name="class_id" id="class_id">
                            @foreach($classes as $oneclass)
                                @if($assignment->class_id == $oneclass->id)
                                    <option value="{{ $oneclass->id }}" selected>
                                        {{ $oneclass->id.' - '.$oneclass->name }}
                                    </option>
                                @else
                                    <option value="{{ $oneclass->id }}">
                                        {{ $oneclass->id.' - '.$oneclass->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('class_id')
                        <div class="problem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <span>Leadás Határidelye:</span>
                    <div>
                        <div>
                            <input type="date" value="{{ $dueDate }}" name="duedate" id="due">
                            <input type="time" value="{{ $dueTime }}" name="duetime" id="due">
                        </div>
                        @error('due')
                        <div class="problem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <span>Pótlás határideje:</span>
                    <input type="date" name="last_due" id="last_due" value="{{ $assignment->last_due }}">
                </div>
                <div>
                    <span>Nem lehet pótolni</span>
                    @if($assignment->last_due == null)
                        <input type="checkbox" name="null_last_due" id="null_last_due" checked>
                    @else
                        <input type="checkbox" name="null_last_due" id="null_last_due">
                    @endif
                </div>
                <div>
                    <span>Max pont:</span>
                    <input type="number" name="max_points" id="max_points" value="{{ $assignment->max_points }}">
                </div>
                <div>
                    <span>Pontozás nélkül</span>
                    @if($assignment->max_points == null)
                        <input type="checkbox" name="null_max_points" id="null_max_points" checked>
                    @else
                        <input type="checkbox" name="null_max_points" id="null_max_points">
                    @endif
                </div>
            </div>
            <div>
                <a target="_parent" href="">
                    <button type="submit">
                        Módosítás
                    </button>
                </a>
                <a target="_parent" href="{{ route('assignments.index') }}">
                    <button type="button">
                        Mégse
                    </button>
                </a>
            </div>
        </div>
    </form>
</body>
</html>
