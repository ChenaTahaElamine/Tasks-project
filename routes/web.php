<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return redirect()->route();
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/tasks")->group(function () {

    Route::get("/add", [TasksController::class, "create"])->name("task.create");//[x]
    Route::post("/ajoute", [TasksController::class, "store"])->name("task.store");//[]
    Route::get("/modifer/{tasks}", [TasksController::class, "edit"])->name("task.edit");//[x]
    Route::put("/modife/{tasks}", [TasksController::class, "update"])->name("task.update");//[]
    Route::delete("/suprimer/{tasks}", [TasksController::class, "destroy"])->name("task.destroy");//[]
    Route::get("/afficher/{tasks}", [TasksController::class, "show"])->name("task.show");//[x]

});