<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="artist_id">Artist Id</label>
            <input type="number" id="artist_id" name="artist_id" value="<?= e((string) ($item?->artist_id ?? old('artist_id'))) ?>">
        </div>
        <div class="field">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= e((string) ($item?->title ?? old('title'))) ?>">
        </div>
        <div class="field">
            <label for="media_type">Media Type</label>
            <input type="text" id="media_type" name="media_type" value="<?= e((string) ($item?->media_type ?? old('media_type'))) ?>">
        </div>
        <div class="field">
            <label for="url">Url</label>
            <input type="text" id="url" name="url" value="<?= e((string) ($item?->url ?? old('url'))) ?>">
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description"><?= e((string) ($item?->description ?? old('description'))) ?></textarea>
        </div>
