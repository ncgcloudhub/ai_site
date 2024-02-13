<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        // dd('Works Logout');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
