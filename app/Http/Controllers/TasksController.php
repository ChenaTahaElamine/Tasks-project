<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    
    public function index()
    {
        $tasks=Tasks::with("utilisateur")->paginate(5);
        return $tasks;
    }

    
    public function create()
    {
        
        return view("layouts.gestion-des-tasks.add");
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show(Tasks $tasks)
    {
        return view("layouts.gestion-des-tasks.show");
    }

    
    public function edit(Tasks $tasks)
    {
        return view("layouts.gestion-des-tasks.update");
    }

    
    public function update(Request $request, Tasks $tasks)
    {
        
    }

    
    public function destroy(Tasks $tasks)
    {
        
    }
}
