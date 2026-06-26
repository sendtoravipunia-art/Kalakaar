<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= e((string) ($item?->name ?? old('name'))) ?>">
        </div>
        <div class="field">
            <label for="category_id">Category Id</label>
            <input type="number" id="category_id" name="category_id" value="<?= e((string) ($item?->category_id ?? old('category_id'))) ?>">
        </div>
