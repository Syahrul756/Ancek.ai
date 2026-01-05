<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancek.Ai - Pricing Desktop 5 Fix</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #0a1128 0%, #00040a 100%);
            min-height: 100vh;
            margin: 0;
            color: white;
            overflow-x: hidden;
        }

        .nav-bar {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            border-bottom: 2px solid #00d2ff;
        }

        .pricing-card {
            background: linear-gradient(180deg, #6200EE 0%, #310077 100%);
            border-radius: 35px;
            padding: 40px 25px;
            min-height: 420px;
            position: relative;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .badge-floating {
            position: absolute;
            top: 25px;
            right: -15px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 15px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }
        .badge-try { background: linear-gradient(90deg, #ff00cc, #3333ff); }
        .badge-hot { background: #ff0000; }

        .list-style {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }
        .list-style li::before {
            content: "• ";
            color: white;
            margin-right: 8px;
        }

        .btn-subscribe {
            background: #2D008F;
            border-radius: 15px;
            padding: 12px 0;
            width: 100%;
            font-weight: 700;
            margin-top: auto;
            transition: background 0.3s ease;
        }
        .btn-subscribe:hover {
            background: #000000;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

    <main class="flex items-center justify-center pt-40 pb-20 px-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 w-full max-w-5xl">
            
            <div class="pricing-card">
                <span class="badge-floating badge-try">Try it</span>
                <h2 class="text-3xl font-bold">$1/ Day</h2>
                <ul class="list-style text-sm text-gray-200">
                    <li>Full Acces</li>
                    <li>Fast AI Processing</li>
                    <li>Standart Support</li>
                </ul>
                <button class="btn-subscribe">Subscribe</button>
            </div>

            <div class="pricing-card">
                <h2 class="text-3xl font-bold">$3/ Week</h2>
                <ul class="list-style text-sm text-gray-200">
                    <li>All pro Feature</li>
                    <li>Priority Queue</li>
                    <li>Ad-Free Experience</li>
                    <li>HD Download</li>
                </ul>
                <button class="btn-subscribe">Subscribe</button>
            </div>

            <div class="pricing-card">
                <span class="badge-floating badge-hot">Hot</span>
                <h2 class="text-3xl font-bold">$8/ Month</h2>
                <ul class="list-style text-sm text-gray-200">
                    <li>Unlimited Generations</li>
                    <li>Cloud Storage</li>
                    <li>Early Acces</li>
                    <li>to new Feature</li>
                </ul>
                <button class="btn-subscribe">Subscribe</button>
            </div>

        </div>
    </main>

    <script>
        const subsButtons = document.querySelectorAll('.btn-subscribe');

        subsButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Notif Loading
                Swal.fire({
                    title: 'Processing...',
                    text: 'Sedang memproses langganan Anda',
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#6200EE', 
                    color: '#fff',
                    didOpen: () => {
                        Swal.showLoading()
                    }
                }).then(() => {
                    // Notif Berhasil
                    Swal.fire({
                        icon: 'success',
                        title: 'Payment Successful!',
                        text: 'Terima kasih Bang! Sekarang fitur Pro sudah aktif.',
                        background: '#310077', 
                        color: '#fff',
                        confirmButtonColor: '#00d2ff',
                        confirmButtonText: 'Gas Dashboard!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'dashboard.php';
                        }
                    });
                });
            });
        });
    </script>

</body>
</html>