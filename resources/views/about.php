<?php /** @var array $features */ ?>
<section class="lp-hero lp-hero-sm">
    <div class="container lp-hero-inner">
        <span class="lp-badge">About Kalakaar</span>
        <h1 class="lp-title">Talent deserves to be found</h1>
        <p class="lp-sub">
            Kalakaar exists to give artists of every discipline a professional home, and to give producers
            a faster, more reliable way to hire them. No middlemen, no noise — just talent and opportunity,
            connected directly.
        </p>
    </div>
</section>

<section class="lp-section">
    <div class="container lp-prose">
        <h2 class="lp-h2">Our mission</h2>
        <p>
            Great creative work happens when the right artist meets the right project. Yet too much talent
            stays invisible, and too many producers waste time searching. Kalakaar closes that gap with a
            single, focused marketplace where reputation is earned through real work and honest reviews.
        </p>

        <h2 class="lp-h2">What you can do</h2>
        <div class="lp-features" style="margin-top:18px">
            <?php foreach ($features as $feature): ?>
                <article class="lp-feature">
                    <div class="lp-feature-icon"><?= e((string) $feature['icon']) ?></div>
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
