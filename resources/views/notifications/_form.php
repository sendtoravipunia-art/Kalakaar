<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="user_id">User Id</label>
            <input type="number" id="user_id" name="user_id" value="<?= e((string) ($item?->user_id ?? old('user_id'))) ?>">
        </div>
        <div class="field">
            <label for="type">Type</label>
            <input type="text" id="type" name="type" value="<?= e((string) ($item?->type ?? old('type'))) ?>">
        </div>
        <div class="field">
            <label for="message">Message</label>
            <input type="text" id="message" name="message" value="<?= e((string) ($item?->message ?? old('message'))) ?>">
        </div>
