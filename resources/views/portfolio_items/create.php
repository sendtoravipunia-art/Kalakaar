<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New Portfolio Item</h1>
        <?= partial('partials.alerts') ?>
        <form action="/portfolio" method="post">
            <?= csrf_field() ?>
            <?= partial('portfolio_items._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>
