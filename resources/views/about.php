<?php /** @var array $features */ ?>
<section class="lp-hero lp-hero-sm">
    <div class="container lp-hero-inner">
        <span class="lp-badge">About Kalakaar</span>
        <h1 class="lp-title">Connecting artists and producers</h1>
        <p class="lp-sub">
            Kalakaar gives artists of every discipline a place to show their work, and gives producers
            a quicker way to find and hire them.
        </p>
    </div>
</section>

<section class="lp-section">
    <div class="container lp-prose">
        <h2 class="lp-h2">Why we built it</h2>
        <p>
            A lot of good talent stays hard to find, and producers spend too long searching for it.
            Kalakaar puts both sides in one place, where an artist's reputation is built from real
            work and honest reviews.
        </p>

        <h2 class="lp-h2">What you can do</h2>
        <div class="lp-features" style="margin-top:18px">
            <?php foreach ($features as $feature): ?>
                <article class="lp-feature">
                    <div class="lp-feature-icon"><?= icon((string) $feature['icon']) ?></div>
                    <h3 class="lp-feature-title"><?= e((string) $feature['title']) ?></h3>
                    <p class="lp-feature-desc"><?= e((string) $feature['desc']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="lp-cta-band">
    <div class="container lp-cta-inner">
        <h2 class="lp-h2">Join the community</h2>
        <p class="lp-lead">Whether you create or you hire, there's a place for you here.</p>
        <div class="lp-cta">
            <a href="/register" class="btn btn-primary btn-lg">Create your account</a>
            <a href="/search" class="btn btn-ghost btn-lg">Explore talent</a>
        </div>
    </div>
</section>
