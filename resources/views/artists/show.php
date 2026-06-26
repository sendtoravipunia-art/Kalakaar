<?php
/** @var array $artist */
/** @var array $portfolio */
/** @var array $reviews */
?>
<section class="container" style="padding:30px 0">
    <p><a href="/artists">&larr; Back to artists</a></p>

    <span class="field-tag"><?= e((string) ($artist['category_name'] ?? '')) ?></span>
    <h1><?= e((string) $artist['artist_name']) ?></h1>
    <p class="hero-sub"><?= e((string) ($artist['headline'] ?? '')) ?></p>

    <?php if (!empty($artist['bio'])): ?>
        <p><?= e((string) $artist['bio']) ?></p>
    <?php endif; ?>

    <div class="card-grid" style="margin-top:20px">
        <div class="card">
            <h3>Details</h3>
            <p class="muted">City: <?= e((string) ($artist['city'] ?? '—')) ?></p>
            <p class="muted">Experience: <?= e((string) ($artist['experience_years'] ?? '—')) ?> years</p>
            <p class="muted">Rate: ₹<?= e((string) ($artist['hourly_rate'] ?? '—')) ?>/hr</p>
            <p class="muted">Available: <?= !empty($artist['available']) ? 'Yes ✅' : 'No' ?></p>
        </div>
    </div>

    <h2 class="section-title" style="margin-top:34px">Portfolio</h2>
    <?php if (empty($portfolio)): ?>
        <p class="muted">No portfolio items yet.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($portfolio as $p): ?>
                <li>
                    <a href="<?= e((string) $p['url']) ?>" target="_blank" rel="noopener"><?= e((string) $p['title']) ?></a>
                    <span class="muted">(<?= e((string) $p['media_type']) ?>)</span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2 class="section-title" style="margin-top:34px">Reviews</h2>
    <?php if (empty($reviews)): ?>
        <p class="muted">No reviews yet.</p>
    <?php else: ?>
        <?php foreach ($reviews as $r): ?>
            <div class="card" style="margin-bottom:12px">
                <strong><?= e((string) ($r['producer_name'] ?? 'Producer')) ?></strong>
                — <span class="accent"><?= str_repeat('★', (int) $r['rating']) ?></span>
                <p class="muted"><?= e((string) ($r['comment'] ?? '')) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (auth() && (auth()['role'] ?? '') === 'producer'): ?>
        <h2 class="section-title" style="margin-top:34px">Hire this artist</h2>
        <?= partial('partials.alerts') ?>
        <form action="/artists/<?= e((string) $artist['id']) ?>/hire" method="post" class="form-card" style="margin:0;max-width:none">
            <?= csrf_field() ?>
            <div class="field"><label for="title">Project title</label><input id="title" name="title" required></div>
            <div class="field"><label for="message">Message</label><textarea id="message" name="message"></textarea></div>
            <div class="field"><label for="budget">Budget (₹)</label><input id="budget" type="number" name="budget"></div>
            <button class="btn btn-primary" type="submit">Send hire request</button>
        </form>
    <?php elseif (!auth()): ?>
        <p style="margin-top:24px"><a class="btn btn-primary" href="/login">Log in as a producer to hire</a></p>
    <?php endif; ?>
</section>
