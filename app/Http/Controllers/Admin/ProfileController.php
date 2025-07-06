<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function updatePassword(Request $request)
    {
        try {
            $data = $request->validate([
                'current_password' => 'required|string',
                'password'         => 'required|string|min:8|confirmed',
            ]);

            $user = Auth::user();

            if(! Hash::check($data['current_password'], $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => ['Password saat ini tidak sesuai.']
                ]);
            }

            $user->password = Hash::make($data['password']);

            $user->save();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with('status', 'Password berhasil diubah. Silakan login kembali.');
        } catch(ValidationException $ve) {
            throw $ve;
        } catch(\Exception $e) {
            Log::error('ProfileController@updatePassword error: '.$e->getMessage());

            return back()->withErrors([
                'error' => 'Terjadi kesalahan. Silakan coba lagi.'
            ]);
        }
    }
}
