<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    # Cek status login Admin
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.adminLogin');
        }
    }

    # Cek login Admin
    public function login(Request $request)
    {
        # Validasi email password
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
        );

        # Cek data admin
        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $admin = auth()->user();
            return redirect()->intended(url('/admin/dashboard'));
        } else {
            return redirect()->back()->withError('Email atau Password tidak ditemukan');
        }
    }

    public function dashboard()
    {
        $adminCount = Admin::count();
        $userCount = User::count();
        $anggotaCount = Member::count();
        return view('admin.adminDashboard', compact('adminCount', 'userCount', 'anggotaCount'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
