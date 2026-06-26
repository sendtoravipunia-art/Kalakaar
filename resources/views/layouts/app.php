<?php /** @var string $content */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Kalakaar') ?></title>
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="/">🎭 Kalakaar</a>
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
            <p>&copy; <?= date('Y') ?> Kalakaar — built with PHP, MySQL &amp; Shell.</p>
        </div>
    </footer>
</body>
</html>
