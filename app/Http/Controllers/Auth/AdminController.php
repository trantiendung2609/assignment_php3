<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.home_admin');
        
    }

    // function admin()
    // {
    //     // return view('admin.home_admin');

    //     if (Auth::user()->role == '1') {
    //         // return redirect('/home_admin');
    //         return view('admin.home_admin');
    //         // return redirect()->route('brand.index');

    //         // } else if (Auth::user()->role == '0') {
    //         //     // return redirect('home.index');
    //         //     return redirect()->route('home');
    //     } else {
    //         return redirect()->route('login');
    //     }
    // }
}