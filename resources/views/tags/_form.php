<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= e((string) ($item?->name ?? old('name'))) ?>">
        </div>
