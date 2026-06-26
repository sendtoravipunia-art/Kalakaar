<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= e((string) ($item?->name ?? old('name'))) ?>">
        </div>
        <div class="field">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" value="<?= e((string) ($item?->slug ?? old('slug'))) ?>">
        </div>
        <div class="field">
            <label for="icon">Icon</label>
            <input type="text" id="icon" name="icon" value="<?= e((string) ($item?->icon ?? old('icon'))) ?>">
        </div>
