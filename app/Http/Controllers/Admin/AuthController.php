<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function logout(){
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
    
    public function loginPost(Request $request)
    {
        $checkUser = Admin::where('email',$request->get('email'))->first();
        if($checkUser && \Hash::check($request->get('password'),$checkUser->password)){
            session()->put('admin',$checkUser);
            return redirect()->route('admin.home');
        }
        else{
            return redirect(route('admin.login'));
        }
    }
}
