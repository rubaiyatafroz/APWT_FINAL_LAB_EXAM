<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\http\Requests\RegistrationRequest;

use App\Models\Student;

class RegistrationController extends Controller
{
    public function index(){
        
           return view('registration.index');
       
    }
    public function verify(RegistrationRequest $req){
        
            $user = new Student;
            $user->username = $req->username;
            $user->fullname = $req->full_name;
            $user->password = $req->password;
            
            $user->email = $req->email;
            $user->address = $req->address;
            $user->country = $req->country;
            $user->p_num = $req->p_num;
            $user->dob =  $req->dob;
            
            $user->c_id =1;
            // $user->profile_img = '';
            $user->save();
            return redirect()->route('login.index');
        
    }
}
