<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
                'email'    => 'required',
                'password' => 'required',
            ]);

        $loginValue = $request->input('email');

        $login_type = $this->getLoginType($loginValue);

        $request->merge([
            $login_type => $loginValue
        ]);

        if (auth()->attempt($request->only($login_type, 'password'))) {
            return redirect()->intended($this->redirectPath());
            // return redirect(url('/admin'));
        }
        return redirect()->back()->withInput()->withErrors([ 'email' => "These credentials do not match our records." ]);
    }

    public function getLoginType($loginValue)
    {
        return filter_var($loginValue, FILTER_VALIDATE_EMAIL ) ? 'email'
       : ( (preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \/]?)?((?:\(?\d{1,}\)?[\-\.\ \/]?){0,})(?:[\-\.\ \/]?(?:#|ext\.?|extension|x)[\-\.\ \/]?(\d+))?$%i', $loginValue)) ? 'mobile' : 'name' );
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }
}