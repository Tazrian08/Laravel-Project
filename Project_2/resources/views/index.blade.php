<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        nav h1 {
            margin: 0;
        }


        .detail {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        position: absolute; 
        bottom: 10px; 
        right: 10px; 
}
.become-member-link {
    position: absolute; 
        bottom: 10px; 
        right: 10px; 
}
.become-member-link a {
    text-decoration: none; 
    color: #007BFF; 
    font-weight: bold; 
}


        .detail:hover {
            background-color: #0056b3;
        }

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    position: relative;

}

        h2 {
            color: #333;
            margin-left: 0;
            padding-left: 0;
        }

        p {
            color: #555;
            margin-left: 0;
        }

        .input-container {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.delete-button{
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    position: relative;
    top: 10px;

}

.login-button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.login-button:hover,
.delete-button:hover {
    background-color: #0056b3;
}

.search-bar {
    background-color: #eee;
    padding: 10px;
    text-align: center;
}

.search-bar input[type="text"] {
    width: 300px;
    padding: 10px 5px;
    border: none;
    border-radius: 3px;
}




    </style>
</head>
<body>
    <nav>
        <h1>Marketplace: Product Index</h1>
        <div>
        @auth
        <a href="/"><button class="login-button">Home</button></a>
        <a href="/profile/{{auth()->user()->id}}"><button class="login-button">Profile</button></a>
        @else
        <a href="/"><button class="login-button">Home</button></a>
        <a href="/loginpage"><button class="login-button">Login</button></a>
        <a href="/registerpage"><button class="login-button">Sign Up</button></a>

        @endauth
        </div>
    </nav> 
    <div class="search-bar">
        <form action="/search" method="get">
            <input type="text" name="query" placeholder="Search products or users">
            <button class="login-button" type="submit">Search</button>
        </form>
    </div>
    @foreach ($products as $product)
    <div class="container">
        <h2>{{$product['Name']}}</h2>
        <p>Posted by: {{$product->user->name}}</p>
        <p>Posted: {{$product['created_at']->diffForHumans()}}</p>
        <p>Last Update: {{$product['updated_at']->diffForHumans()}}</p>

        @auth
        <a href="/prodpage/{{$product->id}}"><button class="detail">Details</button></a>
        @if (auth()->user()==$product->user)
        <a href="/edit/{{$product->id}}"><button class="login-button">Edit Post</button></a>
        <form action="/delete/{{$product->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-button">Delete Post</button>
        </form>

        @endif

        @else
        <div class="become-member-link">
        <a href="/registerpage">Become a member to see details</a>
        </div>

        @endauth
    </div>
    @endforeach
    
</body>
</html>