<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class,'index']);
Route::resource('project', ProjectController::class);
Route::get('task/{id}/create', [TaskController::class,'_create'])->name('task._create');
Route::resource('task', TaskController::class);
Route::post('task-sort',[TaskController::class,'sort'])->name('task.sort');
