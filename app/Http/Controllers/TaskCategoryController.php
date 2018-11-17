<?php

namespace App\Http\Controllers;

use App\task_category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCategoryController extends Controller
{
    public function fetchOne($id)
    {
        $taskCategory = task_category::findOrFail($id);

        foreach($taskCategory->tasks as $task) {
            $exist = User::whereHas('tasks', function ($query) use ($task) {
                $query->where('id', '=', $task->id);
            })->exists();

            $task->isDone = $exist ? "is--done" : "";
        }

        return view('tasks/fetchOneByCategoryId')
            ->with('taskCategory', $taskCategory);
    }
}
