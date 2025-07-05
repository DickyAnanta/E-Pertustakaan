<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Pastikan hanya user yang bisa akses, bukan admin
        if(Auth::guard('web')->check()) {
            return view('user.dashboard');
        }
        return redirect('/login')->withErrors(['email' => 'Akses ditolak.']);
    }
}