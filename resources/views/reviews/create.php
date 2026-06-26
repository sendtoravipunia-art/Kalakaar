<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New Review</h1>
        <?= partial('partials.alerts') ?>
        <form action="/reviews" method="post">
            <?= csrf_field() ?>
            <?= partial('reviews._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>
