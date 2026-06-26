<?php /** @var array $items */ ?>
<section class="container" style="padding:30px 0">
    <?= partial('partials.alerts') ?>
    <div style="display:flex;justify-content:space-between;align-items:center;gap:16px">
        <h1>Artist Skills</h1>
        <a class="btn btn-primary btn-sm" href="/artist-skills/create">New Artist Skill</a>
    </div>
    <?php if (empty($items)): ?>
        <p class="muted" style="margin-top:18px">Nothing here yet.</p>
    <?php else: ?>
        <div class="artist-grid">
            <?php foreach ($items as $item): ?>
                <div class="artist-card">
                    <h3><?= e((string) ($item->artist_id ?? ('#' . $item->id))) ?></h3>
                    <a class="btn btn-ghost btn-sm" href="/artist-skills/<?= e((string) $item->id) ?>">View</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
