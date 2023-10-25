<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Page</title>
</head>
<style>
    body {
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

.container {
    max-width: 1000px;
    margin: 20px left;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    text-align: left;
}
.container1 {
    max-width: 800px;
    margin: 20px top;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    text-align: center;
    justify-content: center;
}
.container img {
    width: 100%; 
    height: auto; 
    display: block;
}
.container-wrapper {
    display: flex;
    flex-wrap: wrap;
}

.container, .container1 {
    flex: 1;
    margin: 10px; 
}
.login-button{
    
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

</style>

<body>
    <nav>
        <h1>Marketplace: {{$product->Name}}</h1>
        <div>
        <a href="/"><button class="login-button">Home</button></a>
        <a href="/profile/{{auth()->user()->id}}"><button class="login-button">Profile</button></a>
        </div>
    </nav> <br>

    <a href="/index"><button class="login-button">Back to Index</button></a>
    @if (auth()->user()==$product->user)
    <a href="/edit/{{$product->id}}"><button class="login-button">Edit Post</button></a>
    @endif
    <div class="container-wrapper">
        <div class="container">
            <small> Last Updated: {{$product['updated_at']->diffForHumans()}}</small>
            <img src="{{asset('images/' . $product->image_path)}}">
            <h1>{{$product->Name}}</h1>
            <h3>Price: {{$product->Price}}</h3>
            <h3>Condition: {{$product->Condition}}</h3>
            <h3>Location: {{$product->location}}</h3>
            @if (auth()->user()->id==$product['user_id'])
            <form action="/delete/{{$product->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="login-button">Delete Post</button></a>
            </form>
            @endif


        </div>
        <div class="container1">
            <h1>Owner: {{$product->user->name}}</h1>
            <h3>To buy product, contact below:</h3>
            <p>Contact Number:{{$product->user->contact_number}}</p>
            <p>Email:{{$product->user->email}}</p>
        </div>
    </div>
</body>
</html>