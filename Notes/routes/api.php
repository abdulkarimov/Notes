<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('/Category',[CategoryController::class, 'Get']);
Route::post('/Category',[CategoryController::class, 'Add']);
Route::put('/Category/{id}',[CategoryController::class, 'Edit']);
Route::delete('/Category/{id}',[CategoryController::class, 'Delete']);


Route::get('/Status',[StatusController::class, 'Get']);
Route::post('/Status',[StatusController::class, 'Add']);
Route::put('/Status/{id}',[StatusController::class, 'Edit']);
Route::delete('/Status/{id}',[StatusController::class, 'Delete']);
