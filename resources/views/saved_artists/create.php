<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New Saved Artist</h1>
        <?= partial('partials.alerts') ?>
        <form action="/saved-artists" method="post">
            <?= csrf_field() ?>
            <?= partial('saved_artists._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>
