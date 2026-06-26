<?php
/** @var array $filters */
/** @var array $results */
/** @var array $categories */
?>
<section class="container" style="padding:30px 0">
    <h1>Find Talent</h1>
    <p class="muted">Filter artists by field, keyword and city.</p>

    <form action="/search" method="get" class="card"
          style="display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:12px;align-items:end;margin-top:16px">
        <div class="field" style="margin:0">
            <label for="field">Field</label>
            <select id="field" name="field">
                <option value="">Any field</option>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= e((string) $c['name']) ?>" <?= ($filters['field'] ?? '') === $c['name'] ? 'selected' : '' ?>>
                        <?= e((string) $c['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field" style="margin:0">
            <label for="q">Keyword</label>
            <input id="q" name="q" value="<?= e((string) ($filters['q'] ?? '')) ?>" placeholder="e.g. singer">
        </div>
        <div class="field" style="margin:0">
            <label for="city">City</label>
            <input id="city" name="city" value="<?= e((string) ($filters['city'] ?? '')) ?>" placeholder="e.g. Mumbai">
        </div>
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <p class="muted" style="margin:20px 0"><?= count($results) ?> artist(s) found.</p>

    <div class="artist-grid">
        <?php foreach ($results as $a): ?>
            <div class="artist-card">
                <span class="field-tag"><?= e((string) ($a['category_name'] ?? '')) ?></span>
                <h3><?= e((string) $a['artist_name']) ?></h3>
                <p class="bio"><?= e((string) ($a['headline'] ?? '')) ?></p>
                <?php if (!empty($a['city'])): ?><p class="muted"><?= e((string) $a['city']) ?></p><?php endif; ?>
                <a class="btn btn-ghost btn-sm" href="/artists/<?= e((string) $a['id']) ?>">View profile</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
