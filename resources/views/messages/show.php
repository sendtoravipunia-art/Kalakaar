<?php /** @var \App\Core\Model $item */ ?>
<section class="container" style="padding:30px 0">
    <p><a href="/messages">&larr; Back to Messages</a></p>
    <h1><?= e((string) ($item->body ?? ('#' . $item->id))) ?></h1>
    <div class="card">
        <?php foreach ($item->toArray() as $key => $value): ?>
            <p><strong><?= e((string) $key) ?>:</strong> <?= e((string) $value) ?></p>
        <?php endforeach; ?>
    </div>
    <div style="margin-top:16px;display:flex;gap:10px">
        <a class="btn btn-ghost btn-sm" href="/messages/<?= e((string) $item->id) ?>/edit">Edit</a>
        <form action="/messages/<?= e((string) $item->id) ?>/delete" method="post" onsubmit="return confirm('Delete this Message?')">
            <?= csrf_field() ?>
            <button class="btn btn-ghost btn-sm" type="submit">Delete</button>
        </form>
    </div>
</section>
