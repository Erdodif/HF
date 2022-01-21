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
    <form method="POST" class="assignment" action="{{ route('assignments.store') }}" target="_parent">
        @csrf
        <div class="headers">
            <h1>
                <input type="text" class="h2" name="title" id="title" placeholder="Cím">
            </h1>
            @error('title')
            <div class="problem">
                {{ $message }}
            </div>
            @enderror
            <textarea class="description" name="description" id="description" placeholder="Leírás">
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
                            <option value="{{ $person->id }}">
                                {{ $person->id.' - '.$person->name }}
                            </option>
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
                            <option value="{{ $oneclass->id }}">
                                {{ $oneclass->id.' - '.$oneclass->name }}
                            </option>
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
                        <input type="date" name="duedate" id="due">
                        <input type="time" name="duetime" id="due">
                        @error('due')
                        <div class="problem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <span>Pótlás határideje:</span>
                    <input type="date" name="last_due" id="last_due" >
                </div>
                <div>
                    <span>Nem lehet pótolni</span>
                    <input type="checkbox" name="null_last_due" id="null_last_due" checked>
                </div>
                <div>
                    <span>Max pont:</span>
                    <input type="number" name="max_points" id="max_points">
                </div>
                <div>
                    <span>Pontozás nélkül</span>
                    <input type="checkbox" name="null_max_points" id="null_max_points" checked>
                </div>
            </div>
            <div>
                <a target="_parent" href="{{ route('assignments.index') }}">
                    <button type="button">
                        Mégse
                    </button>
                </a>
                <a target="_self" href="{{ route('assignments.store') }}">
                    <button type="submit">
                        Mentés
                    </button>
                </a>
            </div>
        </div>
    </form>
</body>
</html>
