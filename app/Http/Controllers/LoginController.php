<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class LoginController extends Controller
{
    //
    public function showLoginForm()
	{
        if(!auth()->user())
            return view('auth.login');
        
        return redirect(route('dashboard'))->withErrors('You Are Already Logged In');
    }

    public function login()
	{
        // dd(request());
		$this->validate(request(), [
			'email' => 'required|email',
			'password' => 'required|min:3'
		]);

		$credentials = request()->only('email', 'password');
		
        $remember = request('remember');
        
        if(auth()->attempt($credentials, $remember)) {

            return redirect(route('dashboard'));
        }

        return redirect('/login')->withErrors('Wrong Email or Password Combination');

		
		
    }
    
    public function logout()
    {
    	Auth::logout();
    	return redirect('/admin');
    }
}
