<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required',
            'phone_number' => 'required',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        return redirect('/login');
    }

    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            logger('Login successful for user: ' . $request->username);
            session(['username' => $request->username]);
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect('/');
            }
        } else {
            logger('Login failed for username: ' . $request->username);
            return back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function saveBio(Request $request){
        $saveprof = Biodata::find(Auth::user()->id_user);
        $biodata = $request->validate([
            'nama_lengkap' => 'required',
            'phone_number' => 'required',
            'alamat' => 'required',
        ]);
        if($saveprof){
            $saveprof->update($biodata);
        }else{
            $biodata['id_user'] = Auth::user()->id_user;
            Biodata::create($biodata);
        }
        return redirect('/');
    }
}