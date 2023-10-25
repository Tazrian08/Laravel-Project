<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Edit</title>
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

        .login-button,
        .sign-up,
        .start-shopping-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-button:hover,
        .sign-up:hover,
        .start-shopping-button:hover {
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
    align-items: center;
    justify-content: center;
    text-align: center;
}

        h2 {
            color: #333;
        }

        p {
            color: #555;
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
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
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

.login-button:hover {
    background-color: #0056b3;
}

        /* You can add more CSS styles for your specific content here */

    </style>
</head>
<body>
    <nav>
        <h1>Product Edit Form:</h1>
        <div>
        <a href="/"><button class="sign-up">Home</button></a>
        <a href="/profile/{{auth()->user()->id}}"><button class="login-button">Profile</button></a>
        
        </div>
    </nav> 
    <a href="/index"><button class="sign-up">Back to Index</button></a>


    <div class="container">
        <h2>Edit form:</h2>
        <form action="/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-container">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$product['Name']}}" placeholder="Enter Product Name" required>
            </div>
            <div class="input-container">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="{{$product->Price}}" placeholder="Enter Product Price" required>
            </div>
            <div class="input-container">
                <label for="condition">Condition (new, old, refurbished, etc)</label>
                <input type="text" id="condition" name="condition" value="{{$product->Condition}}" placeholder="Enter Product Condition" required>
            </div>

            <div class="input-container">
                <label for="image">{{$product->image_path}}</label>
                <input type="file" id="image" name="image">
            </div>

            <button class="login-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
