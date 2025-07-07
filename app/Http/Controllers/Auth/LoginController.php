<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'    => 'required|email',
                'password' => 'required|string',
            ]);

            if(Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                return redirect()->intended(route('admin.home'));
            }

            throw ValidationException::withMessages([
                'email' => ['Email atau password salah.'],
            ]);

        } catch(ValidationException $e) {
            throw $e;
        } catch(\Exception $e) {
            Log::error('Login error: '.$e->getMessage());

            return back()->withErrors([
                'error' => 'Terjadi kesalahan pada server. Silakan coba lagi nanti.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        } catch(\Exception $e) {
            Log::error('Logout error: '.$e->getMessage());

            return back()->withErrors([
                'error' => 'Gagal logout. Silakan coba lagi.',
            ]);
        }
    }
}
