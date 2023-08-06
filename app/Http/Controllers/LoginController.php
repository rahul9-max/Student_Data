<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Middleware\HomeGuard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('login');
    }

    public function signin(Request $req){
        $customer= Customer::where(['email'=>$req->input('email')])->first();
        if(!$customer || !Hash::check($req->input('password'),$customer->password)){
            return "Username or Password is invalid";
        }
        else{
            $req->session()->put('customers',$customer);
            return redirect('/home');
        }
    }
    public function logout(Request $req){
        if ($req->session()->has('customers')) {
            // Auth::logout();
            // $req->session()->invalidate();
            // $req->session()->regenerateToken();
            $req->session()->flush('customers');
        return redirect('/customer');
        }
    }

}
