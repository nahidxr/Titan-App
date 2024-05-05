<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TitanController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',[TestController::class,'test']);
Route::get('/titan/view',[TitanController::class,'index']);
