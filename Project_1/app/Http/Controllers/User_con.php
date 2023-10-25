<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class User_con extends Controller
{
    public function Logout(){
        auth()->logout();  //logout
        return redirect('/home');
    }
    public function Login(Request $request){
        $logins=$request -> validate([
            'lname' => 'required',
            'lpassword'=> 'required'
        ]);
        if (auth()->attempt(['name'=>$logins['lname'], 'password' => $logins['lpassword']])) {  //checks name and password column value of user table is same or not
            $request->session()->regenerate();
            
        }
        return redirect('/home');

    }
    public function Register(Request $request){   //Function that is in User controller that is being called from Web route file
        $inputs=$request -> validate ([
            'name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('users','email')], //unique(table name, column name)
            'password' => ['required','min:8']
        ]);
        $inputs['password']=bcrypt($inputs['password']);
        $u = User::create($inputs);
        auth()->login($u) ;  //$user logging in
        return redirect('/home');

        return 'Worked';
    }

}
