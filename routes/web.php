<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [TaskController::class, "index"])->name("tasks.index");
Route::group(['prefix' => 'tasks'], function () {
    Route::view("/create", "create")->name('tasks.create');
    Route::get('/{task}', [TaskController::class, "show"])->name('tasks.show');
    Route::post("/create", [TaskController::class, "store"])->name("tasks.store");
    Route::get("/{task}/edit", [TaskController::class, "edit"])->name("tasks.edit");
    Route::put("/{task}/edit", [TaskController::class, "update"])->name("tasks.update");
    Route::put("/{task}/toggle-complete", [TaskController::class, "toggleComplete"])->name("tasks.toggle-complete");
    Route::delete("/{task}/delete", [TaskController::class, "destroy"])->name("tasks.destroy");
});
