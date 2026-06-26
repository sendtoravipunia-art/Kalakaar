<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New Message</h1>
        <?= partial('partials.alerts') ?>
        <form action="/messages" method="post">
            <?= csrf_field() ?>
            <?= partial('messages._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>
