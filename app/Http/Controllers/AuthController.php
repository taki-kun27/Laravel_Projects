<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function viewAuth(){
        return view('auth');
    }

    public function secureAuth(Request $request): RedirectResponse
    {
            if(Auth::check()){

                $user = $request->user();

                return redirect('/products');
            }
    }

    public function authenticateUsers(Request $request) : RedirectResponse
    {
            $credentials = $request->validate([
                'username' => ['required','alpha_num'],
                'password' => ['required', 'alpha_num'],
            ]);

            $credentials = [
                'username' => $request->username,
                'password' => $request->password,
            ];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('index');
            }

            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.'
            ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.view'); 
    }
    

}
