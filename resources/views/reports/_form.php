<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="reporter_id">Reporter Id</label>
            <input type="number" id="reporter_id" name="reporter_id" value="<?= e((string) ($item?->reporter_id ?? old('reporter_id'))) ?>">
        </div>
        <div class="field">
            <label for="target_type">Target Type</label>
            <input type="text" id="target_type" name="target_type" value="<?= e((string) ($item?->target_type ?? old('target_type'))) ?>">
        </div>
        <div class="field">
            <label for="target_id">Target Id</label>
            <input type="number" id="target_id" name="target_id" value="<?= e((string) ($item?->target_id ?? old('target_id'))) ?>">
        </div>
        <div class="field">
            <label for="reason">Reason</label>
            <input type="text" id="reason" name="reason" value="<?= e((string) ($item?->reason ?? old('reason'))) ?>">
        </div>
