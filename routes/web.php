<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TitanController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',[TestController::class,'test']);
// Route::get('/titan/view',[TitanController::class,'index']);
// Route::get('/titan/create', [TitanController::class, 'create']);
// Route::post('/titan', [TitanController::class, 'store']);
// Route::get('/titan/{id}/edit', [TitanController::class, 'edit']);
// Route::put('/titan/{id}', [TitanController::class, 'update']);
// Route::delete('/titan/{id}', [TitanController::class, 'destroy']);

 Route::get('/titan/view',[TitanController::class,'index']);
Route::get('/titan/create', [TitanController::class, 'create'])->name('video-parameters.create');
Route::post('/titan', [TitanController::class, 'store'])->name('video-parameters.store');
Route::get('/titan/{id}/edit', [TitanController::class, 'edit'])->name('video-parameters.edit');
Route::put('/titan/{id}', [TitanController::class, 'update'])->name('video-parameters.update');
Route::delete('/titan/{id}', [TitanController::class, 'destroy'])->name('video-parameters.destroy');
Route::get('/titan/updateNginxConfig',[TitanController::class,'updateNginxConfig']);
