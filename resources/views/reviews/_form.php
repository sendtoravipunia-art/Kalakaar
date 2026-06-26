<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="artist_id">Artist Id</label>
            <input type="number" id="artist_id" name="artist_id" value="<?= e((string) ($item?->artist_id ?? old('artist_id'))) ?>">
        </div>
        <div class="field">
            <label for="producer_id">Producer Id</label>
            <input type="number" id="producer_id" name="producer_id" value="<?= e((string) ($item?->producer_id ?? old('producer_id'))) ?>">
        </div>
        <div class="field">
            <label for="rating">Rating</label>
            <input type="number" id="rating" name="rating" value="<?= e((string) ($item?->rating ?? old('rating'))) ?>">
        </div>
        <div class="field">
            <label for="comment">Comment</label>
            <textarea id="comment" name="comment"><?= e((string) ($item?->comment ?? old('comment'))) ?></textarea>
        </div>
