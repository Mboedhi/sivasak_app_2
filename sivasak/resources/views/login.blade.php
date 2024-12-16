<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <img src="pgp.png" alt="Logo" class="logo">
    <h2>Login</h2>
    <div class="form">
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <!-- Field untuk email -->
            <input type="email" name="email" placeholder="Email" required><br>
        
            <!-- Field untuk password -->
            <input type="password" name="password" placeholder="Password" required id="password"><br>

            <input type="checkbox" onclick="togglePassword()"><label for="password"> Show Password </label>
            <br><br>

            <!-- Tombol submit -->
             <div style="text-align: center"><input type="submit" value="Login"></div>
            
            <p style="text-align: center;">Don't have an account? <a href="/register">Register</a></p>
        </form>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<script>
    // Fungsi untuk mengubah tipe input password
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>

</body>
</html>