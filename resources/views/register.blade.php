<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
body {
    background-color: #0A397F;
}

h2 {
    text-align: center;
    color: white;
}

form {
    width: 500px;
    margin: 0 auto;
    margin-top: 10px;
    padding: 20px;
    background-color: #CACDED;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px #000000;
}

form input[type="username"],
form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    border: 1px solid #1a237e;
    border-radius: 20px;
    font-family: inherit;
}

form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #1565c0;
    color: #ffffff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0d47a1;
}

form .error {
    color: #ff0000;
    margin-bottom: 10px;
}

form .success {
    color: #4caf50;
    margin-bottom: 10px;
}



    </style>
</head>
<body>
    <h2>Create Account</h2>
    <form method="POST" action="">
        <input type="username" name="username" required placeholder="Username"><br>
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <input type="password" name="confirm_password" required placeholder="Confirm Password"><br>
        <input type="submit" value="Create Account">
        <p style="text-align: center;">Already have an account? <a href="index.php">Login</a></p>
    </form>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
</body>
</html>