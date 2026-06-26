<?php
/** @var string $role */
/** @var \App\Core\Model|null $profile */
/** @var array $categories */
?>
<section class="container" style="padding:30px 0">
    <div class="form-card" style="max-width:560px">
        <h1>My Profile</h1>
        <p class="muted">Keep your profile complete so you stand out.</p>

        <?= partial('partials.alerts') ?>

        <form action="/profile" method="post">
            <?= csrf_field() ?>

            <?php if ($role === 'artist'): ?>
                <div class="field">
                    <label for="category_id">Field</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Select your field…</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= e((string) $c['id']) ?>"
                                <?= (string) ($profile?->category_id ?? old('category_id')) === (string) $c['id'] ? 'selected' : '' ?>>
                                <?= e((string) $c['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="field">
                    <label for="headline">Headline</label>
                    <input id="headline" name="headline" value="<?= e((string) ($profile?->headline ?? old('headline'))) ?>"
                           placeholder="e.g. Playback singer & composer" required>
                </div>

                <div class="field">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" rows="4"><?= e((string) ($profile?->bio ?? old('bio'))) ?></textarea>
                </div>

                <div class="field">
                    <label for="city">City</label>
                    <input id="city" name="city" value="<?= e((string) ($profile?->city ?? old('city'))) ?>">
                </div>

                <div class="field">
                    <label for="hourly_rate">Hourly rate (₹)</label>
                    <input id="hourly_rate" type="number" step="0.01" name="hourly_rate"
                           value="<?= e((string) ($profile?->hourly_rate ?? old('hourly_rate'))) ?>">
                </div>

                <div class="field">
                    <label for="experience_years">Experience (years)</label>
                    <input id="experience_years" type="number" name="experience_years"
                           value="<?= e((string) ($profile?->experience_years ?? old('experience_years'))) ?>">
                </div>

                <div class="field">
                    <label>
                        <input type="checkbox" name="available" value="1"
                            <?= ($profile?->available ?? 1) ? 'checked' : '' ?>>
                        Available for work
                    </label>
                </div>
            <?php else: ?>
                <div class="field">
                    <label for="company">Company / Studio</label>
                    <input id="company" name="company" value="<?= e((string) ($profile?->company ?? old('company'))) ?>" required>
                </div>

                <div class="field">
                    <label for="bio">About</label>
                    <textarea id="bio" name="bio" rows="4"><?= e((string) ($profile?->bio ?? old('bio'))) ?></textarea>
                </div>

                <div class="field">
                    <label for="city">City</label>
                    <input id="city" name="city" value="<?= e((string) ($profile?->city ?? old('city'))) ?>">
                </div>

                <div class="field">
                    <label for="website">Website</label>
                    <input id="website" name="website" value="<?= e((string) ($profile?->website ?? old('website'))) ?>">
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary" style="width:100%">Save profile</button>
        </form>
    </div>
</section>
