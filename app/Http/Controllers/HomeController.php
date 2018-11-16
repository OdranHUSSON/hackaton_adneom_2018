<?php

namespace App\Http\Controllers;

use App\task_category;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskCategory = task_category::all();
        return view('home')
            ->with('taskCategory', $taskCategory);
    }
}
