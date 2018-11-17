<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function fetchOne($id = null)
    {
        $user = $id === null ? Auth::user(): User::findOrFail($id);

        return view('users/fetchOne')
            ->with('user', $user)
            ->with('isMe', $id === null);
    }
}
