<section class="container" style="padding:30px 0">
    <div class="form-card">
        <h1>New Hire Request</h1>
        <?= partial('partials.alerts') ?>
        <form action="/hire-requests" method="post">
            <?= csrf_field() ?>
            <?= partial('hire_requests._form') ?>
            <button class="btn btn-primary" type="submit" style="width:100%">Create</button>
        </form>
    </div>
</section>
