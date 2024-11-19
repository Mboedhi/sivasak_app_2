<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <!-- <div id="popup" class="popup success">
        ✅ Akun anda sudah terdaftar, silahkan login.
    </div> -->
    <div class="container">
        <img src="pgp.png" alt="Logo" class="logo">
        <h2>Create Account</h2>
        <div class="form">
            <form method="POST" action="{{ route('register_submit') }}">
                @csrf
                <input type="text" name="name" placeholder="Username" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
                <div style="text-align: center"><input type="submit" value="Create Account"></div><br>
            </form>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

        </div>

        @if (session('success'))
            <div class="popup success">
                {{ session('success') }}
            </div>
        @endif


        <script>
            // Cek apakah ada notifikasi sukses di session
            <?php if (isset($_SESSION['register_success']) && $_SESSION['register_success']): ?>
                // Tampilkan popup
                document.getElementById('popup').style.display = 'block';

                // Sembunyikan popup setelah 3 detik
                setTimeout(function() {
                    document.getElementById('popup').style.display = 'none';
                }, 3000);

                <?php unset($_SESSION['register_success']); // Hapus session setelah ditampilkan ?>
            <?php endif; ?>
        </script>
    </div>
</body>
</html>
