<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        // ✅ Batasi role yang boleh login
        $user = Auth::user();

        if (!in_array($user->role, ['super-admin', 'staff'])) {
            Auth::logout();
            return redirect('/')->withErrors(['email' => 'Akun Anda tidak diizinkan login.']);
        }

        return redirect()->intended('/admin/dashboard')
            ->with('success', 'Selamat datang, ' . $user->name);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // ✅ simpan waktu terakhir logout ke database
        if ($user) {
            $user->update([
                'last_logout_at' => Carbon::now() // simpan kapan terakhir logout
            ]);
        }

        $lastUser = $user?->name; // ambil nama user sebelum logout

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('last_login_user', $lastUser)
            ->with('last_logout_time', now()->toDateTimeString()) // simpan waktu ke sesi
            ->with('success', 'Anda Berhasil logout, Sampai jumpa lagi!');
    }
}
