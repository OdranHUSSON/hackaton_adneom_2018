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

        $successResult = $this->executeSuccessFilters($user);

        return response(json_encode($successResult), 200)
            ->header('Content-Type', 'application/json');
    }

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

        $successResult = $this->executeSuccessFilters($user);

        return response(json_encode($successResult), 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * @param User $user
     * @return array
     */
    protected function executeSuccessFilters(User $user)
    {
        $successList = Success::all();
        $removedSuccess = [];
        $addedSuccess = [];

        /** @var Success $success */
        foreach ($successList as $success) {
            $allFilterPass = true;

            foreach ($success->filters as $filter) {
                if (!$this->checkSuccessFilter($filter, $user)) {
                    $allFilterPass = false;
                    break;
                }
            }

            if ($allFilterPass && !$user->success->contains($success)) {
                $user->success()->attach($success);
                $user->experience += $success->xp;
                $user->save();

                $addedSuccess[] = $success;
            } else if(!$allFilterPass && $user->success->contains($success)) {
                $user->success()->detach($success);
                $user->experience -= $success->xp;
                $user->save();

                $removedSuccess[] = $success;
            }
        }

        return [
            'addedSuccess' => $addedSuccess,
            'removedSuccess' => $removedSuccess,
        ];
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
        $checkCount = null;

        if ($taskCategory = $filter->taskCategory) {
            $query->where('task_category_id', '=', $taskCategory->id);
            $checkCount = $taskCategory->tasks()->count();
        }

        if (!empty($filter->delay)) {
            $query->where(
                'users_tasks.created_at',
                '>=',
                (new \DateTime())->modify('-' . $filter->delay . ' days')->format('Y-m-d H:i:s')
            );
        }

        if (!empty($filter->task_count)) {
            $checkCount= $filter->task_count;
        }

        return $checkCount === null ? $query->exists(): $query->count() >= $checkCount;
    }
}
