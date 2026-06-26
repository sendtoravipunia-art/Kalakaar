<?php /** @var array $items */ ?>
<section class="container" style="padding:30px 0">
    <?= partial('partials.alerts') ?>
    <div style="display:flex;justify-content:space-between;align-items:center;gap:16px">
        <h1>Producer Profiles</h1>
        <a class="btn btn-primary btn-sm" href="/producer-profiles/create">New Producer Profile</a>
    </div>
    <?php if (empty($items)): ?>
        <p class="muted" style="margin-top:18px">Nothing here yet.</p>
    <?php else: ?>
        <div class="artist-grid">
            <?php foreach ($items as $item): ?>
                <div class="artist-card">
                    <h3><?= e((string) ($item->company ?? ('#' . $item->id))) ?></h3>
                    <a class="btn btn-ghost btn-sm" href="/producer-profiles/<?= e((string) $item->id) ?>">View</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
