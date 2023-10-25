<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Home</h1>
    @auth
    <h2>You're Logged in</h2>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <div style="border: 3px solid black;">
      <h2>Create a New Post</h2>
      <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="post title"><br>
        <textarea name="body" placeholder="body content..."></textarea><br>
        <button>Save Post</button>
      </form>
    </div>
    <div style="border: 3px solid black;">
      <h2>All Posts</h2>
      @foreach($posts as $post)
      <div>
        <h3>{{$post['title']}}</h3>
        {{$post['body']}}<p><a href="/edit-post/{{$post->id}}">Edit</a></p> <!-- redirecting and sending post_id-->
        <form action="/delete-post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')  <!-- Changes method to delete, used for  deletion from database or whatevs-->
          <button>Delete</button>
        </form>
      </div>
      @endforeach

    </div>
  
    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
          @csrf <!-- This is used for form security and form won't work without it, Error 419. Write within the form tag -->
          <input name="name" type="text" placeholder="name">
          <input name="email" type="text" placeholder="email">
          <input name="password" type="password" placeholder="password">
          <button>Register</button>
        </form>
        </div>
        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
              @csrf <!-- This is used for form security and form won't work without it, Error 419. Write within the form tag -->
              <input name="lname" type="text" placeholder="name">
              <input name="lpassword" type="password" placeholder="password">
              <button>Login</button>
            </form>
            </div>
    @endauth 

    
</body>
</html>