<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Artist;

class CustomerController extends Controller
{
    public function registeration()
    {
        return view('registeration');
    }

    public function saveCustomer(Request $request)
    {
        $cus = new Customer();
        $cus->customerID = $request->id;
        $cus->customerPassword = Hash::make($request->password);
        $cus->customerEmail = $request->email;
        $cus->save();
        return redirect()->back()->with('success', 'Registered Successfully!');
    }
    public function login()
    {
        return view('login');
    }
    public function loginCustomer(Request $request)
    {
        $cus = Customer::where('customerID', '=', $request->id)->first();
        if ($cus) {
            if (Hash::check($request->password, $cus->customerPassword))
            {
                $request->Session()->put('loginId', $cus->customerID);
                return redirect('/');
            } else {
                return back()->with('fail', 'Wrong password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }
    public function home(){
        $artist = Artist::get();
        $data = Product::get();
        $data2 = array();
        if (Session::has('loginId')) {
        $data2 = Customer::where('customerID', '=', Session::get('loginId'))->first();
        }
        return view('home', compact('data','data2','artist'));
    }

    public function logout()
    {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/');}
    }
}
