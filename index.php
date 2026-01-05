<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Interactive Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Gradient Ungu ke Magenta sesuai foto */
            background: linear-gradient(180deg, #6200EE 0%, #A100FF 50%, #D500F9 100%);
            min-height: 100vh;
            margin: 0;
            color: white;
            overflow-x: hidden;
        }

        /* Navigasi Kotak Bar Terpisah */
        .nav-bar {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Tombol Get Started dengan efek menggelap saat hover */
        .btn-get-started {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }
        .btn-get-started:hover {
            background: rgba(0, 0, 0, 0.3); /* Menggelap saat mouse di atasnya */
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Foto dengan efek membesar saat hover */
        .img-card {
            border: 6px solid #7B2CBF; 
            border-radius: 45px;
            overflow: hidden;
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            cursor: pointer;
        }
        .img-card:hover {
            transform: scale(1.1) rotate(0deg); /* Membesar dan posisi lurus saat hover */
            z-index: 20;
        }

        .tilted-left { transform: rotate(-10deg); }
        .tilted-right { transform: rotate(15deg); }

        .glass-small {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

    <main class="relative flex flex-col items-center justify-center text-center pt-52 px-6">
        
        <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight">Creativity, Unleashed.</h1>
        <p class="text-white/90 max-w-xl text-lg md:text-xl mb-12 font-light">
            Leverage generative AI with a unique suite of tools to convey your ideas to the world.
        </p>

       <button 
    onclick="window.location.href='dashboard.php'" 
    class="btn-get-started px-14 py-5 text-2xl font-bold rounded-2xl mb-24">
    Get Started
</button>

        <div class="w-full max-w-[1400px] flex justify-between items-center px-12 pb-20">
            
            <div class="tilted-left img-card w-72 h-72 md:w-[420px] md:h-[420px]">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1000" 
                     class="w-full h-full object-cover" alt="AI Art Left">
            </div>

            <div class="tilted-right img-card w-64 h-64 md:w-[350px] md:h-[350px] opacity-90">
                <img src="https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=1000" 
                     class="w-full h-full object-cover" alt="AI Art Right">
            </div>

        </div>
    </main>

</body>
</html>