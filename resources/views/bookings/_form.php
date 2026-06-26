<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="hire_request_id">Hire Request Id</label>
            <input type="number" id="hire_request_id" name="hire_request_id" value="<?= e((string) ($item?->hire_request_id ?? old('hire_request_id'))) ?>">
        </div>
        <div class="field">
            <label for="start_date">Start Date</label>
            <input type="text" id="start_date" name="start_date" value="<?= e((string) ($item?->start_date ?? old('start_date'))) ?>">
        </div>
        <div class="field">
            <label for="end_date">End Date</label>
            <input type="text" id="end_date" name="end_date" value="<?= e((string) ($item?->end_date ?? old('end_date'))) ?>">
        </div>
        <div class="field">
            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="<?= e((string) ($item?->status ?? old('status'))) ?>">
        </div>
