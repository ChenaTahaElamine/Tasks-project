<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return redirect()->route();
// });

Auth::routes(["verify"=>true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");

Route::prefix("/tasks")->middleware("verified")->group(function () {

    Route::get("/add", [TasksController::class, "create"])->name("task.create");
    Route::post("/ajoute", [TasksController::class, "store"])->name("task.store");
    Route::get("/modifer/{tasks}", [TasksController::class, "edit"])->name("task.edit");
    Route::put("/modife/{tasks}/{new_stauts}", [TasksController::class, "update"])->name("task.update");
    Route::delete("/suprimer/{tasks}", [TasksController::class, "destroy"])->name("task.destroy");
    Route::get("/afficher/{tasks}", [TasksController::class, "show"])->name("task.show");
    Route::get("/mon-profile",function(){return view("layouts.gestion-des-tasks.profile");})->name("profile");

});