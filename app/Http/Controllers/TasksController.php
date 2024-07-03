<?php

namespace App\Http\Controllers;

use App\Http\Requests\task\AddTaskRequest;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = Tasks::with("utilisateur")->paginate(5);
        return $tasks;
    }


    public function create()
    {

        return view("layouts.gestion-des-tasks.add");
    }


    public function store(AddTaskRequest $request)
    {
        Tasks::create([
            "titre" => $request->titre,
            "description" => $request->description,
            "id_user" => Auth::user()->id,
        ]);
        return redirect()->route("home");
    }


    public function show(Tasks $tasks)
    {
        return view("layouts.gestion-des-tasks.show");
    }


    public function edit(Tasks $tasks)
    {

        return view("layouts.gestion-des-tasks.update");
    }


    public function update(Tasks $tasks,$new_stauts)
    {
        // $newTask = $tasks->replicate();
        $tasks->status = $new_stauts;
        $tasks->save();

        return redirect()->route("home");
    }


    public function destroy(Tasks $tasks)
    {
        $tasks->delete();

        return redirect()->route("home");

    }
}
