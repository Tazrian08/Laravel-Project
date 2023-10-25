<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Post_con extends Controller
{

    
    public function createPost(Request $request){
        $posts = $request -> validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $posts['title']=strip_tags($posts['title']);    //Strips all html and php code tags so more secure. XSS attacks or whatever.
        $posts['body']=strip_tags($posts['body']);
        $posts['user_id']=auth()->id();

        Post::create($posts); //insert into database
        return redirect('/home');
    }

    public function Edit(Post $post){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/home');
            
        }
        return view('edit-post',['post'=>$post]);  //passes the received get variable to edit-post blade page whole array/row from post table

    }

    public function Editupdate(Post $post, Request $request){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/home');   
        }
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);  //updates that row thats saved in $post
        return redirect('/home');

    }
    public function Deletepost(Post $post){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/home');   
        }
        $post->delete();
        return redirect('/home');
    }
}
