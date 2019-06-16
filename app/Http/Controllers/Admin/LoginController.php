<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * 
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Vreate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function showLoginForm()
    {
        return view('admin.login');
    }

    public function username()
    {
        return 'name';
    }

    protected function guard()
    {
        return \Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        // // $request->session()->invalidate();

        $request->session()->forget($this->guard()->getName());
        $request->session()->regenerate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }
}
