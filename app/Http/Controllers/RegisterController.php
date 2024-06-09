<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function actionregister(Request $request)
    {
        User::create([
            'email' => $request->email,
            'name' => $request->nama,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan email dan password.');
        return redirect('register');
    }
}