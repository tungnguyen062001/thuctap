<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function loginPost(request $request){
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('admin')->attempt($credentials)){
    //         echo "dang nha ok";
    //     }
    //     else{
    //         echo "dang nha loi";
    //     }
    // }
//     function showFormLogin(){
//         if(Auth::guard('admin')->check()) return redirect('admin/home');
//        return view('admin/auth/login');
//    }
   function login(request $request){
       $email = $request->input('email');
       $password = $request ->input('password');

       if( Auth::guard('admin')->attempt(['email'=> $email,'password'=>$password])){
           return redirect('admin/home');
        // echo " đăng nhap ok";
       }
       else{
           return redirect()->back()->with('error','đăng nhập thất bại');
        // echo "dang nhap that bai";
       }
   }
   function logout(){
       Auth::guard('admin')->logout();
       return redirect('admin/login');
   }
}
