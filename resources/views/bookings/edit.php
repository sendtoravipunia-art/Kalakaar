<?php /** @var \App\Core\Model $item */ ?>
<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>Edit Booking</h1>
        <?= partial('partials.alerts') ?>
        <form action="/bookings/<?= e((string) $item->id) ?>/update" method="post">
            <?= csrf_field() ?>
            <?= partial('bookings._form', ['item' => $item]) ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Update</button>
        </form>
    </div>
</section>
