<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function loginVerify(Request $request){

        $data = $request->validate([
            "user_name" => ["required","string"],
            "password" => "required"
        ]);


            // dd(Auth::attempt(['id'=> $request['id'], 'password'=> $request['password']]));
    	if(auth('web')->attempt($data)){
            $role = Auth::user()->role->name;
            
    		if($role == 'admin'){
                return redirect()->intended('admin-panel');
            }else{
                return redirect()->intended('staff-panel');
            }
            
    	}else{
           
    		$error = array('id'=> 'Invalid Username or Password!!');
    		return redirect()->back()->withErrors($error);
    	}

    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
