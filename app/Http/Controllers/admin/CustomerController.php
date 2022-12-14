<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){

        $customer= Customer::select();
        $data = Customer::get();
        return view('admin.customer.index',compact('data'));
    }
    public function create()
    {
        $customers = Customer::get();
        return view('admin.customer.create', compact('customers'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'usename'=>'required',
            'password'=>'required',
            'fullname'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',

        ]);

        $customer = new Customer();
        $customer->username = $request->usename;
        $customer->password = $request->password;
        $customer->fullname = $request->fullname;
        $customer->addcess = $request->access;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->back()->with('success', 'Customer added successfully!');
    }
    public function editC($id)
    {
        $customers= Customer::get();
        $data = Customer::where('username', '=', $id)->first();
        return view('admin.customer.edit', compact('data','customers'));
    }
    public function updateC(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        $fullname = $request->fullname;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;

        Customer::where('username', '=', $username)->update([
            'password'=>$password,
            'fullname'=>$fullname,
            'address'=>$address,
            'phone'=>$phone,
            'email'=>$email,
        ]);
        return redirect()->back()->with('success', 'Customer update successfully!');
    }
    public function delete($id)
    {
        $data = Customer::where('username', '=', $id)->delete();
        return redirect()->back()->with('success', 'Customer removed successfully!');
    }

}
