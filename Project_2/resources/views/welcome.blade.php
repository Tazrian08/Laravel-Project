<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Our Marketplace</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
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
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }
    .become-member-link {
    position: relative;
    bottom: 0px; 
    left: 450px; 
}


.become-member-link a {
    text-decoration: none; 
    color: #007BFF; 
    font-weight: bold; 
}


.become-member-link a:hover {
    color: #5400b3; 
}




    </style>
</head>
<body>
    @auth
    <nav>
        <h1>Welcome to Our Marketplace</h1>
        <div>
        <a href="/postpage"><button class="login-button">Post Product</button></a>
        <a href="/profile/{{auth()->user()->id}}"><button class="login-button">Profile</button></a>
        <a href="/logout"><button class="login-button">Logout</button></a>
        </div>
    </nav>
    <div class="container">
        <h2>Welcome to Our Online Marketplace</h2>
        <p>Buy and sell products with ease on our platform. Explore a wide range of items and find great deals.</p>
        <a href="/index"><button class="start-shopping-button">Start Shopping</button></a>
    </div>
    @else
    <nav>
        <h1>Welcome to Our Marketplace</h1>
        <div>
        <a href="/loginpage"><button class="login-button">Login</button></a>
        <a href="/registerpage"><button class="sign-up">Sign Up</button></a>
        </div>
    </nav> 
    <div class="container">
        <h2>Welcome to Our Online Marketplace</h2>
        <p>Buy and sell products with ease on our platform. Explore a wide range of items and find great deals.</p>
        <a href="/index"><button class="start-shopping-button">Start Shopping</button></a>
        <div class="become-member-link">
            <a href="/registerpage">Want to sell a product? Become a member</a>
        </div>
    </div>
    @endauth


</body>
</html>
