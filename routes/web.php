<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'index'])->name('index');
Route::get('/createTaskForm', [TasksController::class, 'createTaskForm'])->name('createTask');
Route::post('/createNewTask', [TasksController::class, 'createNewTask'])->name('createNewTask');
Route::get('/editTaskForm/{id}', [TasksController::class, 'editTaskForm'])->name('editTaskForm');
Route::post('/editTask', [TasksController::class, 'editTask'])->name('editTask');


Route::get('/editAllTasks', [TasksController::class, 'editAllTasks'])->name('editAllTasks');
Route::get('/deleteTask/{task}', [TasksController::class, 'deleteTask'])->name('deleteTask');

Route::get('/completedTasks', [TasksController::class, 'completedTasks'])->name('completedTasks');
Route::get('/inprogressTasks', [TasksController::class, 'inprogressTasks'])->name('inprogressTasks');
