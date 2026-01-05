<?php
session_start();
include 'koneksi.php';

// Jika user sudah login, tidak perlu daftar lagi, langsung lempar ke dashboard
if (isset($_SESSION['is_login'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dan bersihkan
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi sederhana
    if ($password !== $confirm_password) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        // Cek apakah username atau email sudah terdaftar
        $check_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($check_user) > 0) {
            $error = "Username atau Email sudah digunakan!";
        } else {
            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Simpan ke database
            $query = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$hashed_password')";
            
            if (mysqli_query($conn, $query)) {
                $success = "Pendaftaran berhasil! Silakan login.";
                // Opsional: Langsung pindah ke login setelah 2 detik
                header("refresh:2;url=login.php");
            } else {
                $error = "Gagal mendaftar: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Sign Up</title>
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

        .signup-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            width: 100%;
            max-width: 550px;
            padding: 40px 50px;
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

        .btn-signup {
            background: #2D008F;
            border-radius: 15px;
            width: 100%;
            font-weight: 700;
            transition: all 0.3s;
        }

        .btn-signup:hover {
            background: #000000;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <main class="flex-grow flex items-center justify-center p-6 mt-20">
        <div class="signup-card">
            <h2 class="text-3xl font-bold mb-2">Create Account</h2>
            <p class="text-white/60 text-sm mb-8 text-center">Join Ancek.Ai and start generating today</p>

            <?php if($error != ""): ?>
                <div class="bg-red-500/20 border border-red-500 text-red-200 px-4 py-2 rounded-lg mb-6 w-full text-center text-sm">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if($success != ""): ?>
                <div class="bg-green-500/20 border border-green-500 text-green-200 px-4 py-2 rounded-lg mb-6 w-full text-center text-sm">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="w-full flex flex-col gap-4">
                <input type="text" name="fullname" placeholder="Full Name" class="input-field px-5 py-3 text-sm" required>
                <input type="email" name="email" placeholder="Email Address" class="input-field px-5 py-3 text-sm" required>
                <input type="text" name="username" placeholder="Username" class="input-field px-5 py-3 text-sm" required>
                <input type="password" name="password" placeholder="Password" class="input-field px-5 py-3 text-sm" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="input-field px-5 py-3 text-sm" required>
                
                <button type="submit" class="btn-signup py-4 mt-4 text-lg uppercase tracking-wider shadow-xl">
                    SIGN UP
                </button>
            </form>

            <div class="mt-8 text-xs text-white/60">
                Already have an account? 
                <a href="login.php" class="text-blue-400 font-bold hover:underline">Sign in</a>
            </div>
        </div>
    </main>

</body>
</html>