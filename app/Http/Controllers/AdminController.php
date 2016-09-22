<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            if(Auth::user()->name == 'manager' || Auth::user()->name == 'user') {
                return view('admin.dashboard');
            } else {
                Auth::logout();
                return redirect('/');
            }
        } else {
            return view('auth.login');
        }
    }
}
