<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function edit(Products $product){
        if(auth()->check() && auth()->user()->id==$product['user_id']){
        return view('edit',['product'=>$product]);
        }
    }

    public function update(Products $product, Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:5120'
        ]);
        $product->update([
            'Name' => $request->input('name'),
            'Price' => $request->input('price'),
            'Condition' => $request->input('condition'),
        ]);
        if ($request->hasFile('image')) {
            // Delete the existing image
            if ($product->image_path) {
                Storage::delete('public/images/' . $product->image_path);
            }
    
            // Store the new image following the same naming convention
            $newImage = $request->file('image');
            $newImageName = time() . '-' . $request->input('name') . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('images'), $newImageName);
    
            // Update the image_path field in the database
            $product->update(['image_path' => $newImageName]);
        }
    
        return redirect('/');
        
    }

    public function deleteprod(Products $product){
        if (auth()->user()==$product->user){
            $product->delete();
            
        }
         return redirect('/index');
    }

    public function change(User $user){
        if (auth()->user()->id==$user->id){
            return view('update',['user'=>$user]);
        }
    }


    public function userUpdate(User $user, Request $request){

        $products=Products::where('user_id', auth()->id())->get();
        $request['password']=bcrypt($request['password']);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'location' => $request->input('location'),
            'location' => $request->input('location'),
            'contact_number' => $request->input('contact_number'),
            'password' => $request->input('password'),
        ]);
        return view('profile',['products'=>$products]);
    }
}
