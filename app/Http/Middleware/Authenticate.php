<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Jika guard student, redirect ke student login
            if ($request->is('student/*')) {
                return route('student.login');
            }
            
            // Default redirect ke admin login
            return route('login');
        }

        return null;
    }
}