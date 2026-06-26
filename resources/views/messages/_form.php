<?php /** @var \App\Core\Model|null $item */ $item = $item ?? null; ?>
        <div class="field">
            <label for="conversation_id">Conversation Id</label>
            <input type="number" id="conversation_id" name="conversation_id" value="<?= e((string) ($item?->conversation_id ?? old('conversation_id'))) ?>">
        </div>
        <div class="field">
            <label for="sender_id">Sender Id</label>
            <input type="number" id="sender_id" name="sender_id" value="<?= e((string) ($item?->sender_id ?? old('sender_id'))) ?>">
        </div>
        <div class="field">
            <label for="body">Body</label>
            <textarea id="body" name="body"><?= e((string) ($item?->body ?? old('body'))) ?></textarea>
        </div>
