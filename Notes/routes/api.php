<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/Priority',[PriorityController::class, 'Get']);
Route::post('/Priority',[PriorityController::class, 'Add']);
Route::put('/Priority/{id}',[PriorityController::class, 'Edit']);
Route::delete('/Priority/{id}',[PriorityController::class, 'Delete']);

Route::get('/Note',[NoteController::class, 'Get']);
Route::post('/Note',[NoteController::class, 'Add']);
Route::put('/Note/{id}',[NoteController::class, 'Edit']);
Route::delete('/Note/{id}',[NoteController::class, 'Delete']);
