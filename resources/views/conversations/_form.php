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
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="<?= e((string) ($item?->subject ?? old('subject'))) ?>">
        </div>
