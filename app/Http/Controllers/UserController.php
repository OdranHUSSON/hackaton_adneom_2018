<?php

namespace App\Http\Controllers;

use App\Level;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function fetchOne($id = null)
    {
        $user = $id === null ? Auth::user(): User::findOrFail($id);
        $currentBestRole = $user->levels()->count() > 0 ? $user->levels()->orderBy('required_experience', 'desc')->limit(1)->get()[0]: null;
        $nextBestRoles = Level::whereDoesntHave('users', function ($query) use ($user) {
            $query->where('id', "=", $user->id);
        })->orderBy('required_experience', 'asc')->limit(1)->get();

        $nextBestRole = count($nextBestRoles) > 0 ? $nextBestRoles[0]: null;

        return view('users/fetchOne')
            ->with('user', $user)
            ->with('isMe', $id === null)
            ->with('currentBestRole', $currentBestRole)
            ->with('nextBestRole', $nextBestRole);
    }
}
