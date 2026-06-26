<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="user_id">User Id</label>
            <input type="number" id="user_id" name="user_id" value="<?= e((string) ($item?->user_id ?? old('user_id'))) ?>">
        </div>
        <div class="field">
            <label for="category_id">Category Id</label>
            <input type="number" id="category_id" name="category_id" value="<?= e((string) ($item?->category_id ?? old('category_id'))) ?>">
        </div>
        <div class="field">
            <label for="headline">Headline</label>
            <input type="text" id="headline" name="headline" value="<?= e((string) ($item?->headline ?? old('headline'))) ?>">
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
            <label for="hourly_rate">Hourly Rate</label>
            <input type="number" id="hourly_rate" name="hourly_rate" value="<?= e((string) ($item?->hourly_rate ?? old('hourly_rate'))) ?>">
        </div>
        <div class="field">
            <label for="experience_years">Experience Years</label>
            <input type="number" id="experience_years" name="experience_years" value="<?= e((string) ($item?->experience_years ?? old('experience_years'))) ?>">
        </div>
        <div class="field">
            <label for="available">Available</label>
            <input type="number" id="available" name="available" value="<?= e((string) ($item?->available ?? old('available'))) ?>">
        </div>
