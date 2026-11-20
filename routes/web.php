<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return $request->user()
        ? redirect()->route('home')
        : redirect()->route('login');
});

Route::middleware(['auth', 'active'])->group(function () {

    // Redirect user to dashboard based on role.
    Route::get('/home', function (Request $request) {
        $user = $request->user();

        abort_unless($user, 401);

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'member' => redirect()->route('member.dashboard'),
            default => abort(403),
        };
    })->name('home');

    // Admin routes.
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');
        });

    // Member routes.
    Route::middleware('role:member')
        ->prefix('member')
        ->name('member.')
        ->group(function () {
            Route::get('/dashboard', function () {
                return view('member.dashboard');
            })->name('dashboard');
        });
});