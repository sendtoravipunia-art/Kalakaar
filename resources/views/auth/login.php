<section class="container">
    <div class="form-card">
        <h1>Welcome back</h1>
        <p class="muted">Log in to your Kalakaar account.</p>

        <?= partial('partials.alerts') ?>

        <form action="/login" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= e(old('email')) ?>" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">Log in</button>
        </form>

        <p class="muted" style="margin-top:18px">New to Kalakaar? <a href="/register">Create an account</a></p>
    </div>
</section>
