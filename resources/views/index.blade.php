<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Házifeladat Pajti</title>
        <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">
        <script src="{{ URL::asset('js/resize_assistant.js') }}"></script>
    </head>
    <body>
        <nav>
            <h1 class="logo">Feladatkezelő online</h1>
            <ul>
                <li><a href="{{ route('frame.index')}}" target="internal">Főoldal</a></li>
                <li><a href="{{ route('assignments.index') }}" target="internal">Feladatok</a></li>
                <li><a href="" target="internal">Osztályok</a></li>
                <li><a href="" target="internal">Diákok</a></li>
            </ul>
        </nav>
        <div class="frame-holder">
        @if (isset($internal))
            <iframe src="{{ route($internal) }}" frameborder="0" name="internal" id="internal"></iframe>
        @else
            <iframe src="{{ route('frame.index') }}" frameborder="0" name="internal" id="internal"></iframe>
        @endif
        </div>
        <footer>
            Láb
        </footer>
    </body>
</html>
