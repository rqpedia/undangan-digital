<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // JALUR REDIRECT BAGI YANG SUDAH LOGIN (Mencegah akses form login jika sudah login)
        $middleware->redirectUsersTo(function (Request $request) {
            if (Auth::guard('admin')->check()) {
                return '/super-admin/dashboard';
            }
            if (Auth::guard('web')->check()) {
                return '/dashboard';
            }
            return '/';
        });

        // JALUR REDIRECT BAGI TAMU (Mencegah akses dashboard jika belum login)
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('super-admin*')) {
                return '/super-admin/login';
            }
            return '/login';
        });

        // CSRF diaktifkan semua demi keamanan session
        $middleware->validateCsrfTokens(except: []);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();