<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function logout(Request $request)
    {
        if (!auth()->check()) {
            return redirect('login')->with(['warning' => 'You have not logged in before!']);
        }

        activity()->log('User with id '. auth()->user()->id .' - '. auth()->user()->name .' has been logged out.');

        auth()->logout();

        return redirect('login')->with(['success' => 'You\'ve been logged out.']);

    }
}
