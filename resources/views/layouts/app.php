<?php /** @var string $content */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Kalakaar') ?></title>
    <link rel="icon" type="image/svg+xml" href="/assets/logo.svg">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="/"><img class="brand-logo" src="/assets/logo.svg" width="30" height="30" alt=""><span>Kalakaar</span></a>
            <nav class="nav">
                <a href="/artists">Browse Artists</a>
                <a href="/search">Search</a>
                <?php if (auth()): ?>
                    <a href="/dashboard">Dashboard</a>
                    <form action="/logout" method="post" class="inline">
                        <?= csrf_field() ?>
                        <button type="submit" class="link-btn">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="/login">Login</a>
                    <a href="/register" class="btn btn-primary btn-sm">Join</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <?= $content ?>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="brand" href="/"><img class="brand-logo" src="/assets/logo.svg" width="30" height="30" alt=""><span>Kalakaar</span></a>
                    <p class="footer-tag">A marketplace for artists and producers across every creative field.</p>
                </div>
                <div class="footer-col">
                    <h4>Explore</h4>
                    <a href="/artists">Browse Artists</a>
                    <a href="/search">Search Talent</a>
                    <a href="/about">About</a>
                </div>
                <div class="footer-col">
                    <h4>Account</h4>
                    <a href="/register">Join Kalakaar</a>
                    <a href="/login">Log in</a>
                    <a href="/dashboard">Dashboard</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> Kalakaar. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
