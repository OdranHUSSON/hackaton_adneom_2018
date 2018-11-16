<?php

namespace App\Http\Controllers;

use App\task_category;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    public function fetchOne($id)
    {
        $taskCategory = task_category::findOrFail($id);

        return view('tasks/fetchOneByCategoryId')
            ->with('taskCategory', $taskCategory);
    }
}
