<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('index');
});
Route::get('/online', function () {
    return view('index');
});
Route::group(['prefix'=>'online'],function(){
    Route::any('{any}', function ($any) {
        return view('index', ['internal'=>$any]);
    })->name('index');
    Route::any('{any1}/{any2}', function ($any1,$any2) {
        return view('index', ['internal'=>$any1.'/'.$any2]);
    })->name('index');
});
Route::name('frame.assignments')->resource('assignments',AssignmentController::class);
Route::name('frame.')->prefix('frame')->group(function(){
    Route::get('/', function () {
        return view('frame.index');
    })->name('index');
    Route::get('/kk/{id}', function ($id) {
        return response($id);
    })->name('show');
});