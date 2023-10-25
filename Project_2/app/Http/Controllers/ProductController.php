<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class ProductController extends Controller
{
    public function post_direct(){
        return view('post');
    }

    public function post(Request $request){
        $inputs=$request->validate([
            'name'=>'required',
            'price'=>'required',
            'condition'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        $image=time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$image);

        if (auth()->check()){
        $product= Products::create([
            'user_id'=>auth()->id(),
            'Name'=>$request->input('name'),
            'Price'=>$request->input('price'),
            'Condition'=>$request->input('condition'),
            'location'=>auth()->user()->location,
            'contact_number'=>auth()->user()->contact_number,
            'image_path'=>$image
        ]);
    }
    return redirect('/');

    }


    public function index(){
        $products=Products::all()->sortByDesc('created_at');

        return view('index',['products'=>$products]);
    }

    public function prodpage(Products $product){
        if (auth()->check()){
        return view('prodpage',['product'=>$product]);
        }

    }
    public function search(Request $request) {
        $query = $request->input('query');
        

        $results = Products::where('Name', 'like', '%' . $query . '%')
                     ->orWhere('user_id', function ($subquery) use ($query) {
                         $subquery->select('id')
                             ->from('users')
                             ->where('name', 'like', '%' . $query . '%');
                     })
                     ->get();
        
        return view('index', ['products' => $results]);
    }


}
