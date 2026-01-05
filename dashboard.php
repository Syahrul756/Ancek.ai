<?php
session_start();
include 'koneksi.php';

// Proteksi Login
if (!isset($_SESSION['is_login'])) {
    header("Location: login.php");
    exit();
}

$hasil_gambar = "";

// Cek jika tombol GENERATE diklik
if (isset($_POST['generate'])) {
    $keyword = mysqli_real_escape_string($conn, $_POST['prompt']);
    
    // Cari di database offline (tabel gallery) yang keywordnya mirip
    $query = "SELECT * FROM gallery WHERE keyword LIKE '%$keyword%' LIMIT 1";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);

    if ($data) {
        $hasil_gambar = "img/" . $data['image_path']; 
    } else {
        echo "<script>alert('Gambar tidak ditemukan di database offline!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #0F0026; 
            color: white; 
            margin: 0;
            overflow: hidden;
        }
        
        /* Animasi biar keren pas gambar muncul */
        .img-fade {
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="antialiased">

    <?php include 'navbar.php'; ?>

    <main class="flex flex-grow p-6 gap-6 pt-24 h-screen">
        
        <aside class="w-1/4 flex flex-col gap-4">
            <div class="bg-white/5 border border-white/10 p-6 rounded-[30px] flex flex-col gap-4 shadow-xl">
                <select class="bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none cursor-pointer hover:bg-white/10 transition">
                    <option>Vibe</option>
                </select>
                <select class="bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none cursor-pointer hover:bg-white/10 transition">
                    <option>Lightning</option>
                </select>
                <select class="bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none cursor-pointer hover:bg-white/10 transition">
                    <option>Shot type</option>
                </select>
                <select class="bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none cursor-pointer hover:bg-white/10 transition">
                    <option>Color Theme</option>
                </select>

                <div class="mt-4">
                    <label class="text-[10px] text-white/40 uppercase tracking-widest mb-3 block">Image Dimension</label>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="flex flex-col items-center gap-1 cursor-pointer opacity-50 hover:opacity-100 transition">
                            <div class="w-full aspect-[3/4] border border-white/20 rounded-md bg-white/5 flex items-center justify-center text-[8px]">3:4</div>
                            <span class="text-[8px]">3:4</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 cursor-pointer">
                            <div class="w-full aspect-square border border-purple-500 rounded-md bg-purple-500/20 flex items-center justify-center text-[8px] font-bold">1:1</div>
                            <span class="text-[8px] text-purple-400 font-bold">1:1</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 cursor-pointer opacity-50 hover:opacity-100 transition">
                            <div class="w-full aspect-[16/9] border border-white/20 rounded-md bg-white/5 flex items-center justify-center text-[8px]">16:9</div>
                            <span class="text-[8px]">16:9</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 cursor-pointer opacity-50 hover:opacity-100 transition">
                            <div class="w-full aspect-[2/3] border border-white/20 rounded-md bg-white/5 flex items-center justify-center text-[8px]">...</div>
                            <span class="text-[8px]">Custom</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <section class="flex-grow flex flex-col gap-4">
            <form method="POST" class="flex gap-4">
                <input type="text" name="prompt" required placeholder="Type a prompt (e.g. kuda)..." 
                       class="flex-grow bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-purple-500 transition">
                
                <button type="submit" name="generate" 
                        class="bg-gradient-to-r from-cyan-400 to-purple-600 px-10 py-4 rounded-2xl font-bold uppercase tracking-widest hover:scale-105 transition shadow-lg shadow-purple-500/20">
                    GENERATE
                </button>
            </form>

            <div class="flex-grow bg-white/5 border border-white/10 rounded-[40px] flex items-center justify-center overflow-hidden shadow-inner relative">
                <?php if ($hasil_gambar): ?>
                    <img src="<?php echo $hasil_gambar; ?>" alt="Result" class="max-w-full max-h-full object-contain img-fade p-6">
                <?php else: ?>
                    <div class="text-center">
                        <p class="text-white/10 text-3xl font-bold italic tracking-tighter select-none">Ancek.Ai Canvas</p>
                        <p class="text-white/5 text-xs mt-2 uppercase tracking-widest">Ready to create your vision</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    </main>
</body>
</html>