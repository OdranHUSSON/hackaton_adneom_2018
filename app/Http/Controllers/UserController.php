<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function me() {
        $this->middleware('auth');
        return view('users/me')
            ->with('user', Auth::user());
    }

    public function fetchOne($id) {

        $user = User::findOrFail($id);

        return view('users/fetchOne')
            ->with('user', $user);
    }


}
