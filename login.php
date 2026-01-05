<?php
session_start();
include 'koneksi.php';

// Cek jika user sudah login, langsung lempar ke dashboard
if (isset($_SESSION['is_login'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan bersihkan untuk keamanan dasar
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Cari user di database berdasarkan username
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password (menggunakan password_verify karena di signup di-hash)
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #6200EE 0%, #D500F9 100%);
            min-height: 100vh;
            margin: 0;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .nav-bar {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            width: 100%;
            max-width: 500px;
            min-height: 600px;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            width: 100%;
            color: white;
            outline: none;
            transition: all 0.3s;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: white;
        }

        .btn-login {
            background: #2D008F;
            border-radius: 15px;
            width: 100%;
            font-weight: 700;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #000000;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <main class="flex-grow flex items-center justify-center p-6 mt-20">
        <div class="login-card">
            <div class="w-16 h-16 bg-white rounded-full mb-6 flex items-center justify-center shadow-lg">
                <div class="w-10 h-10 bg-purple-700 rounded-sm rotate-45"></div>
            </div>

            <h2 class="text-3xl font-bold mb-2">Welcome Back</h2>
            <p class="text-white/60 text-sm mb-10 text-center">Enter your details to access your account</p>

            <?php if($error != ""): ?>
                <div class="bg-red-500/20 border border-red-500 text-red-200 px-4 py-2 rounded-lg mb-6 w-full text-center text-sm">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="w-full flex flex-col gap-6">
                <input type="text" name="username" placeholder="Username" class="input-field px-6 py-4 text-sm" required>
                <input type="password" name="password" placeholder="Password" class="input-field px-6 py-4 text-sm" required>
                
                <div class="flex justify-between items-center px-1">
                    <label class="flex items-center gap-2 text-xs text-white/70 cursor-pointer">
                        <input type="checkbox" class="rounded border-white/20 bg-transparent"> Remember me
                    </label>
                    <a href="#" class="text-xs text-blue-400 hover:underline">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login py-4 text-lg uppercase tracking-widest shadow-xl">
                    LOG IN
                </button>
            </form>

            <div class="mt-auto text-xs text-white/60">
                Don't have an account yet? 
                <a href="signup.php" class="text-blue-400 font-bold hover:underline">Create account</a>
            </div>
        </div>
    </main>

</body>
</html>