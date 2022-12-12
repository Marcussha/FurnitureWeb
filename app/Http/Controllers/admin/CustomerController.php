<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){

        $data= Customer::select();
        return view('admin.customer.index',compact('data'));
    }
}
