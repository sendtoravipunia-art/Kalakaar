<?php /** @var \App\Core\Model $item */ ?>
<section class="container" style="padding:30px 0">
    <p><a href="/producer-profiles">&larr; Back to Producer Profiles</a></p>
    <h1><?= e((string) ($item->company ?? ('#' . $item->id))) ?></h1>
    <div class="card">
        <?php foreach ($item->toArray() as $key => $value): ?>
            <p><strong><?= e((string) $key) ?>:</strong> <?= e((string) $value) ?></p>
        <?php endforeach; ?>
    </div>
    <div style="margin-top:16px;display:flex;gap:10px">
        <a class="btn btn-ghost btn-sm" href="/producer-profiles/<?= e((string) $item->id) ?>/edit">Edit</a>
        <form action="/producer-profiles/<?= e((string) $item->id) ?>/delete" method="post" onsubmit="return confirm('Delete this Producer Profile?')">
            <?= csrf_field() ?>
            <button class="btn btn-ghost btn-sm" type="submit">Delete</button>
        </form>
    </div>
</section>
