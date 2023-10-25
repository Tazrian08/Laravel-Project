<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function log_direct(){
        return view('/login');
    }

    public function reg_direct(){
        return view('/register');
    }

    public function register(Request $request) {
        $inputs=$request->validate([
            'name'=>Rule::unique('users','name'),
            'email'=>Rule::unique('users','email'),
            'password'=>'required',
            'location'=>'required',
            'contact_number'=>['required',Rule::unique('users','contact_number')]
            
        ]);
        $inputs['password']=bcrypt($inputs['password']);
        $user = User::create($inputs);
        auth()->login($user) ;
        return redirect('/');

    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }


    public function login(Request $request){
        if (auth()->attempt(['name'=>$request['name'], 'password' => $request['password']])) { 
            $request->session()->regenerate();
            return redirect('/');
        }

    }

    public function profile(User $user){
        $products=Products::where('user_id', auth()->id())->get();
        return view('profile',['products'=>$products]);
    }


}
