<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN LOGIN
    |--------------------------------------------------------------------------
    */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Login menggunakan guard 'web' (admin)
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak valid.',
        ])->onlyInput('email');
    }

    /*
    |--------------------------------------------------------------------------
    | STUDENT LOGIN
    |--------------------------------------------------------------------------
    */
    public function showStudentLogin()
    {
        // Ganti ke view yang sesuai struktur Anda
        return view('auth.login-student'); // atau 'student.login' sesuai struktur folder Anda
    }

    public function studentLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // PENTING: Login menggunakan guard 'student'
        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect ke dashboard student
            return redirect()->intended(route('fe.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak valid.',
        ])->onlyInput('email');
    }

    /*
    |--------------------------------------------------------------------------
    | STUDENT REGISTER
    |--------------------------------------------------------------------------
    */
    public function showRegisterForm()
    {
        // Ganti ke view yang sesuai struktur Anda
        return view('fe.register'); // atau 'student.register'
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student', // PENTING: set role student
        ]);

        // Auto login setelah register menggunakan guard student
        Auth::guard('student')->login($user);

        return redirect()->route('fe.dashboard')->with('success', 'Registrasi berhasil!');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        // Cek guard mana yang sedang login
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            $redirectRoute = 'student.login';
        } else {
            Auth::guard('web')->logout();
            $redirectRoute = 'login';
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route($redirectRoute);
    }
}