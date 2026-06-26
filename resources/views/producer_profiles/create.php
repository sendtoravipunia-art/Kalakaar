<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New Producer Profile</h1>
        <?= partial('partials.alerts') ?>
        <form action="/producer-profiles" method="post">
            <?= csrf_field() ?>
            <?= partial('producer_profiles._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>
