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
}
