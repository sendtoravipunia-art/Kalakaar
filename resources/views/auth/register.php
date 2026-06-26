<section class="container">
    <div class="form-card">
        <h1>Join Kalakaar</h1>
        <p class="muted">Create an account as an artist or a producer.</p>

        <?= partial('partials.alerts') ?>

        <form action="/register" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" value="<?= e(old('name')) ?>" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= e(old('email')) ?>" required>
            </div>

            <div class="field">
                <label for="role">I am a…</label>
                <select id="role" name="role" required>
                    <option value="artist" <?= old('role') === 'artist' ? 'selected' : '' ?>>Artist — I want to be hired</option>
                    <option value="producer" <?= old('role') === 'producer' ? 'selected' : '' ?>>Producer — I want to hire</option>
                </select>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">Create account</button>
        </form>

        <p class="muted" style="margin-top:18px">Already have an account? <a href="/login">Log in</a></p>
    </div>
</section>
