<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Features</title>
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

        /* Kartu Fitur */
        .feature-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            width: 100%;
            max-width: 950px;
            min-height: 550px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        
        /* Efek Menggelap & Pointer saat Hover */
        .hover-darken {
            transition: all 0.3s ease;
            cursor: pointer;
            padding: 20px;
            border-radius: 20px;
        }
        
        .hover-darken:hover {
            background: rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        .profile-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.2);
            object-fit: cover;
        }

        .glass-small {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="antialiased">

    <?php include 'navbar.php'; ?>

    <main class="min-h-screen flex items-center justify-center px-6 pt-24">
        
        <div class="feature-card p-12 md:p-16 flex flex-col md:flex-row items-center gap-8">
            
            <div onclick="window.location.href='dashboard.php'" class="flex-shrink-0 text-center hover-darken w-full md:w-1/3">
                <img src="sa.jpg" 
                     alt="Feature Artist" class="profile-img mx-auto mb-6 shadow-2xl">
                <h3 class="text-2xl font-bold mb-2">Lucid Dream</h3>
                <p class="text-white/60 text-sm italic leading-relaxed">a new standard in image generation<br>vibrant, diverse, and HD</p>
            </div>

            <div class="flex-grow flex flex-col gap-4 w-full md:w-2/3">
                
                <div onclick="window.location.href='dashboard.php'" class="hover-darken">
                    <h2 class="text-3xl font-bold mb-3">AI image generator</h2>
                    <p class="text-white/80 text-lg leading-relaxed">
                        Generate image from text in a snap-perfect, than share and export visual ready to share.
                    </p>
                </div>

                <div class="border-t border-white/10 my-4"></div>

                <div onclick="window.location.href='dashboard.php'" class="hover-darken">
                    <h4 class="text-2xl font-bold mb-2">Discover veo 3</h4>
                    <p class="text-white/60 text-lg">Generate video with sound from simple prompt</p>
                </div>

            </div>

        </div>

    </main>

</body>
</html>