<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function viewAuth(){
        return view('auth');
    }

    public function secureAuth(Request $request): RedirectResponse
    {
        if(Auth::check()){
            return redirect()->route('products.index');
        }
        return redirect()->route('auth.view');
    }

    public function authenticateUsers(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required','alpha_num'],
            'password' => ['required', 'alpha_num'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.'
        ])->onlyInput('username');
    }

    public function viewRegister()
    {
        return view('registerUser');
    }

    public function registerUser(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'username' => ['required', 'alpha_num', 'unique:register_user,username'],
                'password' => ['required', 'alpha_num', 'min:8'],
            ]);

            $user = new RegisterUser();
            $user->username = $validated['username'];
            $user->password = $validated['password'];
            
            if ($user->save()) {
                DB::commit();
                Log::info('User registered successfully', ['username' => $user->username]);
                return redirect()->route('auth.view')->with('success', 'Registration successful. You can now log in.');
            } else {
                DB::rollBack();
                Log::error('Failed to save user');
                return back()->withErrors(['error' => 'Failed to create user account.'])->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withErrors(['error' => 'Registration error: ' . $e->getMessage()])->withInput();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.view'); 
    }
}
