<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Tasks::where("id_user",Auth::user()->id)->with('utilisateur')->latest()->paginate(5);
        return view('layouts.gestion-des-tasks.index',compact("tasks"));
    }
}
