<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="artist_id">Artist Id</label>
            <input type="number" id="artist_id" name="artist_id" value="<?= e((string) ($item?->artist_id ?? old('artist_id'))) ?>">
        </div>
        <div class="field">
            <label for="skill_id">Skill Id</label>
            <input type="number" id="skill_id" name="skill_id" value="<?= e((string) ($item?->skill_id ?? old('skill_id'))) ?>">
        </div>
