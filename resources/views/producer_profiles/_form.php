<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="user_id">User Id</label>
            <input type="number" id="user_id" name="user_id" value="<?= e((string) ($item?->user_id ?? old('user_id'))) ?>">
        </div>
        <div class="field">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="<?= e((string) ($item?->company ?? old('company'))) ?>">
        </div>
        <div class="field">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio"><?= e((string) ($item?->bio ?? old('bio'))) ?></textarea>
        </div>
        <div class="field">
            <label for="city">City</label>
            <input type="text" id="city" name="city" value="<?= e((string) ($item?->city ?? old('city'))) ?>">
        </div>
        <div class="field">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" value="<?= e((string) ($item?->website ?? old('website'))) ?>">
        </div>
