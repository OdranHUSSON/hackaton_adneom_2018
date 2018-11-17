<?php

namespace App\Http\Controllers;

use App\Filter;
use App\Success;
use App\tasks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        tasks::findOrFail($id);
        $user = Auth::user();
        $user->tasks()->attach($id);

        $this->executeSuccessFilters($user);

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function detachTask($id) {
        $this->middleware('auth');
        $task = tasks::findOrFail($id);
        Auth::user()->tasks()->detach($id);
        $user = Auth::user();
        $user->experience -= $task->experience;
        $user->save();
        return response('Ok', 200)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * @param User $user
     */
    protected function executeSuccessFilters(User $user)
    {
        $notMadeSuccess = Success::whereDoesntHave('users', function($query) use ($user) {
            $query->where('id', $user->id);
        })->get();

        /** @var Success $success */
        foreach ($notMadeSuccess as $success) {
            $allFilterPass = true;

            foreach ($success->filters as $filter) {
                if (!$this->checkSuccessFilter($filter, $user)) {
                    $allFilterPass = false;
                    break;
                }
            }

            if ($allFilterPass) {
                $user->success()->attach($success);
            }
        }
    }

    /**
     * @param Filter $filter
     * @param User $user
     *
     * @return bool
     */
    protected function checkSuccessFilter(Filter $filter, User $user)
    {
        $query = $user->tasks()->newQuery();

        if ($taskCategory = $filter->taskCategory) {
            $query->where('task_category_id', '=', $taskCategory->id);
        }

        if (!empty($filter->delay)) {
            $query->where(
                'users_tasks.created_at',
                '>=',
                (new \DateTime())->modify('-' . $filter->delay . ' days')->format('Y-m-d H:i:s')
            );
        }

        if (!empty($filter->task_count)) {
            $query->groupBy('id')->having(DB::raw('COUNT(*)'), '>=', $filter->task_count);
        }

        return $query->exists();
    }
}
