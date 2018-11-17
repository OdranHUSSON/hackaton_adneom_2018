<?php

namespace App\Http\Controllers;

use App\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function attachTask($id) {
        $this->middleware('auth');
        $task = tasks::findOrFail($id);
        Auth::user()->tasks()->attach($id);
        $user = Auth::user();
        $user->experience += $task->experience;
        $user->save();
        return response('Ok', 200)
            ->header('Content-Type', 'text/plain');
    }
}
