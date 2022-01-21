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
    <div class="assignment">
        <div>
            <h2>{{ $assignment->title }}</h2>
            <div class="description">
                {{ $assignment->description }}
            </div>
        </div>
        <div class="stats">
            <div>
                <div>
                    <span>Feladó:</span>
                    <span>{{ $assignment->owner()->name }}</span>
                </div>
                <div>
                    <span>Osztály:</span>
                    <span>{{ $assignment->getClass()->name }}</span>
                </div>
                <div>
                    <span>Leadás Határidelye:</span>
                    <span>{{ $assignment->due }}</span>

                </div>
                @if($assignment->isEnded())
                    <p>Lejárt a határidő
                    @if(!$assignment->isClosed())
                        , de leadható később.
                    @else
                        , már nem adható le megoldás...
                    @endif
                    </p>
                @endif
            </div>
            <a target="_parent" href="{{ route('assignments.index') }}">
                <button>
                    Vissza a feladatokhoz
                </button>
            </a>
        </div>
    </div>
</body>
</html>
