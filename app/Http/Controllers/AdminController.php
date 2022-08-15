<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('adminLogin');
    }

    public function loginAdmin(Request $request)
    {
        $admin = Admin::where('adminID', '=', $request->id)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->adminPassword))
            {
                $request->Session()->put('loginId', $admin->adminID);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Wrong password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }
    public function dashboard(){
        $data = array();
        if (Session::has('loginId')) {
        $data = Admin::where('adminID', '=', Session::get('loginId'))->first();
        }
        
        return view('dashboard', compact('data'));
    }

  
   public function logout()
    {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/');}
    }
    
    public function table()
    {   
        $data2 = Product::get();
        $data = array();
        if (Session::has('loginId')) {
        $data = Admin::where('adminID', '=', Session::get('loginId'))->first();
        }
             
        return view('table', compact('data', 'data2'));
    }
}
