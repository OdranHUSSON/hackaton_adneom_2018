<?php

namespace App\Http\Controllers;

use App\Success;
use App\task_category;
use App\User;

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
        $success = Success::all();
        $users = User::all();

        return view('home')
            ->with('taskCategory', $taskCategory)
            ->with('success', $success)
            ->with('users', $users);
    }
}
