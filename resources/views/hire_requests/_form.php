<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="producer_id">Producer Id</label>
            <input type="number" id="producer_id" name="producer_id" value="<?= e((string) ($item?->producer_id ?? old('producer_id'))) ?>">
        </div>
        <div class="field">
            <label for="artist_id">Artist Id</label>
            <input type="number" id="artist_id" name="artist_id" value="<?= e((string) ($item?->artist_id ?? old('artist_id'))) ?>">
        </div>
        <div class="field">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= e((string) ($item?->title ?? old('title'))) ?>">
        </div>
        <div class="field">
            <label for="message">Message</label>
            <textarea id="message" name="message"><?= e((string) ($item?->message ?? old('message'))) ?></textarea>
        </div>
        <div class="field">
            <label for="budget">Budget</label>
            <input type="number" id="budget" name="budget" value="<?= e((string) ($item?->budget ?? old('budget'))) ?>">
        </div>
        <div class="field">
            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="<?= e((string) ($item?->status ?? old('status'))) ?>">
        </div>
