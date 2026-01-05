<header class="nav-bar fixed top-0 w-full z-50">
    <div class="max-w-[1440px] mx-auto flex justify-between items-center px-12 py-5">
        <div class="flex items-center gap-3">
            <a href="index.php" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                    <div class="w-6 h-6 bg-purple-600 rounded-sm rotate-45"></div>
                </div>
                <span class="text-2xl font-bold tracking-tight text-white">Ancek.Ai</span>
            </a>
        </div>
        
        <nav class="hidden md:flex items-center gap-20">
            <a href="feature.php" class="font-medium text-white hover:text-white/70 transition">Feature</a>
            <a href="pricing.php" class="font-medium text-white hover:text-white/70 transition">Pricing</a>
            <a href="contact.php" class="font-medium text-white hover:text-white/70 transition">Contact</a>
        </nav>

      <div class="flex items-center gap-10">
    <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] === true): ?>
        <span class="text-sm font-semibold text-white/80">Halo, <?php echo $_SESSION['username']; ?></span>
        <a href="logout.php" class="text-sm font-semibold text-red-400 hover:text-red-300 transition underline">
            Logout
        </a>
    <?php else: ?>
        <a href="login.php" class="text-sm font-semibold hover:underline">Sign in</a>
        <a href="signup.php" class="glass-small px-6 py-2 rounded-full text-sm font-bold hover:bg-white/20 transition">
            Join now
        </a>
    <?php endif; ?>
</div>
    </div>
</header>