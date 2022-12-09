<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(){
        if(Session::has('adminLogin')){
            Session :: pull ('adminLogin');
            return view('/login');
        }
    }
}
