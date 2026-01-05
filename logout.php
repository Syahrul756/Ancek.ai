<?php
session_start();
session_unset(); // Hapus semua data session
session_destroy(); // Hancurkan session

// Balikkan ke halaman utama setelah logout
header("Location: index.php");
exit();
?>