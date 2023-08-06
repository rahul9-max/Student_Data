<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
use Session;

class StudentController extends Controller
{
    //
    public function home(){
        return view('home');
    }
    public function student(){
        // $customer=Customer::all();
        $url=url('/customer');
        $title="Register User";
        // $data=compact('url','title');
        $customer = new Customer();
        return view('form',[
            'url'=>$url,
            'title'=>$title,
            'customer'=>$customer
        ]);
    }
    public function store(Request $request){
        echo "<pre>";
        print_r($request->all());
        // demo($request->all());
        // die;
        $customer=new Customer;
        $customer->name=$request['name'];
        $customer->email=$request['email'];
        $customer->password=bcrypt($request['password']);
        // $customer->password=Hash::make($request['password']);
        $customer->confirm_password = bcrypt($request['confirm_password']);
        $customer->gender=$request['gender'];
        $customer->address=$request['address'];
        $customer->country=$request['country'];
        $customer->dob=$request['dob'];
        $customer->save();
         return redirect('customer/view');
    }
    // public function view(Request $request){
    //     $search=$request['search'] ??  "" ;
    //     if($search!= ""){
    //        $customer= Customer::where('name',"LIKE","%$search%")->get();
    //     }else{
    //         $customer=Customer::all();
    //     }
    //     $data=compact(['customer','search']); // The compact() function is used to create an array of variables and their values.
    //     return view('customer-view')->with($data);
    // }
    public function view(Request $request){
     $search=isset($request['search']) && $request['search']!="" ? $request['search'] : "" ;
        if($search!=""){
            $customer=Customer::where('name','LIKE','%'.$search.'%')->orwhere('email','LIKE',"%$search%")->get();
        }       
       else{
        $customer=Customer::paginate(10);
       }
       $data=compact(['customer','search']);
       return view('customer-view')->with($data);
    }
     

    public function delete($id){
        $customer=Customer::find($id);
        if(!is_null($customer)){
            $customer->delete($id);
        }
        return redirect('customer/view');
    }
    public function edit($id){
        $customer=Customer::find($id);
        // $customer=Customer::where('id',$id)->first();
        if(is_null($customer)){
            return redirect('home');
        }
        else{
            $url=url('/customer/update')."/".$id;
            $title="Edit Registration";
            $data=[
            'url'=>$url,
            'title'=>$title,
            'customer'=>$customer
        ];
            return view('form',$data);
        }
    }
    public function update($id,Request $request){
        $customer=Customer::find($id);
        // dd($customer);
        // if(is_null($customer)){
        //     return redirect('home');
        // }
        // else{
            $customer->name=$request['name'];
            $customer->email=$request['email'];
            $customer->gender=$request['gender'];
            $customer->address=$request['address'];
            // $customer->state=$request['state'];
            $customer->country=$request['country'];
            $customer->dob=$request['dob'];
            $customer->save();
            return redirect('customer/view');
        }
        // public function signin(Request $request){
        //     $email=$request->input('email');
        //     $password=$request->input('password');

        //     $customer=DB::table('customers')->where('email',$email)->first();
        //     if($customer && Hash::check($password,$customer->password)){
        //         $request->session()->put('customers',$customer);
        //         // dd($request->session()->all());
        //         return redirect('/home');
        //     }
        //     else{
        //         return view('login')->with('info','no usern found..please register first');
        //     }
        // }
        
        
}