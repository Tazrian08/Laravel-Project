<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile: {{auth()->user()->name}}</title>
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
    text-align: center;
    justify-content: center;
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
    height: 800px;
    overflow:auto;
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
.login-button:hover,
.delete-button:hover,
.detail:hover {
    background-color: #0056b3;
}
.detail {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        justify-content: bottom;
        align-items: right;

}


</style>
<body>
    @auth
    <nav>
        <h1>Marketplace: Profile of {{auth()->user()->name}}</h1>
        <div>
            <a href="/"><button class="login-button">Home</button></a>
            <a href="/index"><button class="login-button"> Index</button></a>
            <a href="/logout"><button class="login-button">Logout</button></a>
        </div>
    </nav>


    <div class="container-wrapper">
        <div class="container">
            <h1>Name: {{auth()->user()->name}}</h1>
            <h3>Email: {{auth()->user()->email}}</h3>
            <h3>Contact Number: {{auth()->user()->contact_number}}</h3>
            <a href="/update/{{auth()->user()->id}}"><button class="login-button">Update Information</button></a>
            <a href="/postpage"><button class="delete-button">Post Product</button></a>
        </div>
        <div class="container1">
            <h1>My Posts</h1>
            @foreach ($products as $product)
            <div class="container">
                <h2>{{$product['Name']}}</h2>
                <p>Posted by: {{$product->user->name}}</p>
                <p>Posted: {{$product['created_at']->diffForHumans()}}</p>
                <p>Last Update: {{$product['updated_at']->diffForHumans()}}</p>
                <a href="/prodpage/{{$product->id}}"><button class="detail">Details</button></a>
                <form action="/delete/{{$product->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-button">Delete Post</button></a>
                </form>
 
                <a href="/edit/{{$product->id}}"><button class="login-button">Edit Post</button></a>
            </div>
            @endforeach
    </div>
    @else
        nope
    @endauth
</body>
</html>