<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #6200EE 0%, #A100FF 50%, #D500F9 100%);
            min-height: 100vh;
            margin: 0;
            color: white;
        }
        .nav-bar {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .signup-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 50px;
            width: 100%;
            max-width: 480px;
        }
        .input-field {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            transition: 0.3s;
        }
        .btn-signup {
            background: linear-gradient(to right, #7B2CBF, #9D4EDD);
            transition: 0.3s;
        }
        .btn-signup:hover {
            filter: brightness(0.7);
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="flex flex-col">

    <header class="nav-bar fixed top-0 w-full z-50">
        <div class="max-w-[1440px] mx-auto flex justify-between items-center px-12 py-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                    <div class="w-6 h-6 bg-purple-600 rounded-sm rotate-45"></div>
                </div>
                <a href="index.html" class="text-2xl font-bold">Ancek.Ai</a>
            </div>
            <nav class="hidden md:flex items-center gap-20">
                <a href="index.html" class="font-medium hover:text-white/70 transition">Feature</a>
                <a href="#" class="font-medium hover:text-white/70 transition">Pricing</a>
                <a href="#" class="font-medium hover:text-white/70 transition">Contact</a>
            </nav>
            <div class="flex items-center gap-10">
                <a href="login.html" class="text-sm font-semibold hover:underline">Sign in</a>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center pt-32 pb-12 px-6">
        <div class="signup-card p-10 flex flex-col items-center text-center">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <div class="w-7 h-7 bg-purple-600 rounded-sm rotate-45"></div>
                </div>
                <h2 class="text-3xl font-bold">Ancek.Ai</h2>
            </div>
            <p class="text-white/70 text-sm mb-8">Create your account</p>

            <form action="index.html" class="w-full flex flex-col gap-4">
                <input type="text" placeholder="Full name" class="input-field w-full px-5 py-3 text-sm" required>
                <input type="email" placeholder="Email address" class="input-field w-full px-5 py-3 text-sm" required>
                <input type="text" placeholder="Username" class="input-field w-full px-5 py-3 text-sm" required>
                <input type="password" placeholder="Password" class="input-field w-full px-5 py-3 text-sm" required>
                <input type="password" placeholder="Confirm password" class="input-field w-full px-5 py-3 text-sm" required>
                
                <button type="submit" class="btn-signup w-full py-4 mt-4 rounded-2xl text-lg font-bold uppercase tracking-wider">
                    SIGN UP
                </button>
            </form>
        </div>
    </main>

</body>
</html>