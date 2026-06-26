<?php /** @var \App\Core\Model $item */ ?>
<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>Edit Report</h1>
        <?= partial('partials.alerts') ?>
        <form action="/reports/<?= e((string) $item->id) ?>/update" method="post">
            <?= csrf_field() ?>
            <?= partial('reports._form', ['item' => $item]) ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Update</button>
        </form>
    </div>
</section>
