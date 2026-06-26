<?php /** @var array $artists */ ?>
<section class="container" style="padding:30px 0">
    <h1>Browse Artists</h1>
    <p class="muted">Discover talent across every field.</p>

    <?php if (empty($artists)): ?>
        <p class="muted" style="margin-top:18px">No artist profiles yet. <a href="/register">Be the first →</a></p>
    <?php else: ?>
        <div class="artist-grid">
            <?php foreach ($artists as $a): ?>
                <div class="artist-card">
                    <span class="field-tag"><?= e((string) ($a['category_name'] ?? 'Artist')) ?></span>
                    <h3><?= e((string) $a['artist_name']) ?></h3>
                    <p class="bio"><?= e((string) ($a['headline'] ?? '')) ?></p>
                    <?php if (!empty($a['city'])): ?>
                        <p class="muted">📍 <?= e((string) $a['city']) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($a['hourly_rate'])): ?>
                        <p class="rate">₹<?= e((string) $a['hourly_rate']) ?>/hr</p>
                    <?php endif; ?>
                    <a class="btn btn-ghost btn-sm" href="/artists/<?= e((string) $a['id']) ?>">View profile</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
