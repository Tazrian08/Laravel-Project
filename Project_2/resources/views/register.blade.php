<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
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
        <h1>Marketplace: Sign up Page</h1>
        <div>
        <a href="/"><button class="sign-up">Home</button></a>
        <a href="/loginpage"><button class="sign-up">Login</button></a>
        </div>
    </nav> 


    <div class="container">
        <h2>Registration</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="input-container">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your username" required>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-container">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter your location" required>
            </div>
            <div class="input-container">
                <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" placeholder="Enter your Contact Number" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required minlength="8">
            </div>
            <button class="login-button" type="submit">Register</button>
        </form>
    </div>
</body>
</html>
