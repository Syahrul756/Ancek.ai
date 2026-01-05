<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Contact Desktop 6</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #1a0633; 
            min-height: 100vh;
            margin: 0;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .nav-bar {
            background: linear-gradient(180deg, #9d4edd 0%, #1a0633 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-container {
            background: #25124a; 
            border-radius: 30px;
            width: 100%;
            max-width: 900px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        .image-side {
            width: 40%;
            background: #1e0b3d;
            padding: 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .img-card {
            border-radius: 20px;
            background-size: cover;
            background-position: center;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

      /* Ganti nama_file.jpg dengan nama foto yang ada di folder img Abang */

.img-1 { 
    width: 100%; 
    aspect-ratio: 1/1; 
    background-image: url('sa.jpg'); /* Ganti ini */
} 

.img-2 { 
    width: 60%; 
    aspect-ratio: 1/1; 
    background-image: url('chi.jpg'); /* Ganti ini */
} 

.img-3 { 
    width: 35%; 
    aspect-ratio: 1/1.5; 
    transform: rotate(15deg); 
    background-image: url('kuda.jpg'); /* Ganti ini */
    margin-top: 10px; 
} 

.img-4 { 
    width: 60%; 
    aspect-ratio: 1/1; 
    margin-left: 20px; 
    background-image: url('tentara.jpg'); /* Ganti ini */
}
        .form-side {
            width: 60%;
            padding: 50px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 11px;
            color: #b1a1cf;
            margin-bottom: 5px;
            display: block;
        }

        .input-box {
            background: #0d041d;
            border: 1px solid #3d2b5e;
            border-radius: 8px;
            width: 100%;
            padding: 12px;
            color: white;
            font-size: 13px;
            margin-bottom: 20px;
            outline: none;
        }

        .input-box:hover { background: #000000; }
        
        .btn-send {
            background: #1a0b33;
            border: 1px solid #3d2b5e;
            padding: 10px 30px;
            border-radius: 12px;
            align-self: flex-end;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }
        .btn-send:hover { background: #000000; color: white; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

    <main class="flex-grow flex items-center justify-center p-10 mt-10">
        <div class="contact-container">
            <div class="image-side">
                <div class="img-card img-1"></div>
                <div class="img-row">
                    <div class="img-card img-2"></div>
                    <div class="img-card img-3"></div>
                </div>
                <div class="img-card img-4"></div>
            </div>

            <div class="form-side">
                <h2 class="text-2xl font-bold mb-8 text-center">Need contact us?</h2>
                
                <form id="contactForm">
                    <div>
                        <label>Your Ancek.Ai username*</label>
                        <input type="text" class="input-box" required>
                    </div>
                    
                    <div>
                        <label>Email address*</label>
                        <input type="email" class="input-box" required>
                    </div>
                    
                    <div>
                        <label>Detail*</label>
                        <textarea class="input-box" rows="5" placeholder="Detail, error messages or any other useful informations" required></textarea>
                    </div>

                    <button type="button" class="btn-send">Send message</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        const btnSend = document.querySelector('.btn-send');
        
        btnSend.addEventListener('click', function() {
            const inputs = document.querySelectorAll('.input-box');
            let isEmpty = false;

            // Cek apakah ada kolom kosong
            inputs.forEach(input => {
                if(input.value.trim() === "") isEmpty = true;
            });

            if(isEmpty) {
                Swal.fire({
                    icon: 'error',
                    title: 'Waduh!',
                    text: 'Semua kolom wajib diisi ya Bang!',
                    background: '#25124a',
                    color: '#fff',
                    confirmButtonColor: '#9d4edd'
                });
                return;
            }

            // Animasi Loading
            Swal.fire({
                title: 'Sending...',
                text: 'Sedang mengirim pesan Anda',
                timer: 1500,
                timerProgressBar: true,
                background: '#25124a',
                color: '#fff',
                didOpen: () => {
                    Swal.showLoading()
                }
            }).then(() => {
                // Notif Sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Message Sent!',
                    text: 'Pesan sudah terkirim. Tim kami akan segera menghubungi Abang.',
                    background: '#25124a',
                    color: '#fff',
                    confirmButtonColor: '#9d4edd'
                }).then(() => {
                    // Reset isi form
                    inputs.forEach(input => input.value = "");
                });
            });
        });
    </script>

</body>
</html>