<?php

use App\Models\Post;
use App\Http\Controllers\Post_con;
use App\Http\Controllers\User_con;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {  
    return view('welcome'); 
});
Route::get('/home', function () { 
    $posts=[];
    if (auth()->check()){
        $posts=auth()->user()->posts()->latest()->get(); //auth->user() returns an instance of User model. posts is a function in User model. latest is sort by date. Only give posts made by logged in user.
    }
    //$posts=Post::all(); //all tables in $posts
    //$posts=Post::where('user_id', auth()->id())->get(); // All tables where post author mathces the user_id. Login state doesn't matter
    
    return view('home',['posts'=>$posts]);  //sending all tables of post model to home. 'posts' refer to the $posts variable in home blade page
});

Route::view("home2",'home'); //Firs is url, 2nd is page name. Same code as the one above. Both Localhost:8000/home and home2 goes to home

Route::post('/register', [User_con::class, 'Register'] );  //Use ::post to route submission forms (reg or login pages)
                                                        //First parameter is url, 2nd can be function
                                                        //Or in this case, an array where 1st element is Controller class and 2nd is the method in that class
Route::post('/logout', [User_con::class, 'Logout'] );

Route::post('/login', [User_con::class, 'Login'] );

//Blog or whatever post controllers
Route::post('/create-post', [Post_con::class, 'createPost'] );



Route::get('/edit-post/{post}', [Post_con::class, 'Edit'] ); //passing post to edit-post page

Route::put('/edit-post/{post}', [Post_con::class, 'Editupdate'] ); //put method to update stuff

Route::delete('/delete-post/{post}', [Post_con::class, 'Deletepost'] ); //delete method to delete stuff