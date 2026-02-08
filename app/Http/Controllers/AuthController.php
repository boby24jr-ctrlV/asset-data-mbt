<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================= ADMIN LOGIN =================
    public function showLoginForm()
    {
        return view('auth.login'); // login admin
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            // 🔐 CEK ROLE ADMIN
            if (auth()->user()->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }

            // kalau bukan admin → logout
            Auth::logout();
            return back()->with('error', 'Akun ini bukan admin');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // ================= STUDENT LOGIN =================
    public function showStudentLogin()
    {
        return view('auth.login-student');
    }

    public function studentLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            // 🔐 CEK ROLE STUDENT
            if (auth()->user()->role === 'student') {
                $request->session()->regenerate();
                return redirect()->route('fe.dashboard');
            }

            // kalau bukan student → logout
            Auth::logout();
            return back()->with('error', 'Akun ini bukan student');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // ================= STUDENT REGISTER =================
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student', // default student
        ]);

        return redirect()->route('student.login');
    }

    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
