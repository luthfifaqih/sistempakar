<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        // Validasi email yang sudah ada
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            Session::flash('error', 'Email telah terdaftar');
            return redirect('register');
        }

        // Buat pengguna baru jika email belum terdaftar
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => 1
        ]);

        Session::flash('message', 'Register Berhasil. Akun anda sudah aktif silahkan login email dan password.');
        return redirect('register');
    }
}
