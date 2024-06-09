<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect('information');
        } else if (Auth::user()->role == 'penjual') {
            return redirect('products');
        } else {
            return view('page.beranda_pembeli');
        }
    }
}