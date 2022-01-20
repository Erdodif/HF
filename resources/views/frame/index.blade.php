<!DOCTYPE html>
<?php

use App\Models\Assignment;
use App\Models\Classes;
use App\Models\Solution;
use App\Models\User;

$assignmentCount = Assignment::all()->count();
$solutionCount = Solution::all()->count();
$classCount = Classes::all()->count();
$userCount = User::all()->count();
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/frame/index.css') }}">
</head>
<body>
    <h1>Főoldal</h1>
    <p>{{ $assignmentCount }} darab feladat van az adatbáziban, ami(k)re {{ $solutionCount }} darab megoldás érkezett.</p>
    <p>A rendszer {{ $classCount }} osztály összesen {{ $userCount }} felhasználóját tartja nyilván.</p>
</body>
</html>