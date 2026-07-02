<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Proses autentikasi
        $request->authenticate();

        // Regenerasi session
        $request->session()->regenerate();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Jika user tidak ditemukan
        if (! $user) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Login gagal. Silakan coba kembali.',
                ]);
        }

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

        // PERBAIKAN: Customer redirect ke halaman menu
        return redirect('/menu');
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // PERBAIKAN: Redirect ke halaman utama
        return redirect('/');
    }
}