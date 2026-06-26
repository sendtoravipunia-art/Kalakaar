<?php
/** @var array $stats */
/** @var array $fields */
/** @var array $features */
?>
<!-- Hero -->
<section class="lp-hero">
    <div class="container lp-hero-inner">
        <span class="lp-badge">A marketplace for creative talent</span>
        <h1 class="lp-title">Hire the right <span class="lp-grad">Kalakaar</span><br>for every project</h1>
        <p class="lp-sub">
            Kalakaar connects artists of every field — music, dance, acting, photography, writing and more —
            with producers who want to hire them. Build a profile, get discovered, and get to work.
        </p>
        <div class="lp-cta">
            <a href="/search" class="btn btn-primary btn-lg">Find talent</a>
            <a href="/register" class="btn btn-ghost btn-lg">Join as an artist</a>
        </div>

        <div class="lp-stat-row">
            <div class="lp-stat"><span class="lp-stat-num"><?= e((string) $stats['artists']) ?>+</span><span class="lp-stat-label">Artist profiles</span></div>
            <div class="lp-stat"><span class="lp-stat-num"><?= e((string) $stats['categories']) ?></span><span class="lp-stat-label">Creative fields</span></div>
            <div class="lp-stat"><span class="lp-stat-num"><?= e((string) $stats['producers']) ?>+</span><span class="lp-stat-label">Producers hiring</span></div>
            <div class="lp-stat"><span class="lp-stat-num"><?= e((string) $stats['hires']) ?>+</span><span class="lp-stat-label">Hire requests</span></div>
        </div>
    </div>
</section>

<!-- Fields -->
<section class="lp-section">
    <div class="container">
        <div class="lp-section-head">
            <h2 class="lp-h2">Talent across every field</h2>
            <p class="lp-lead">From the stage to the studio — discover professionals in the discipline you need.</p>
        </div>
        <div class="lp-chips">
            <?php foreach ($fields as $f): ?>
                <a class="lp-chip" href="/search?field=<?= e(urlencode((string) $f['name'])) ?>">
                    <?= e((string) $f['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Features -->
<section class="lp-section lp-section-alt">
    <div class="container">
        <div class="lp-section-head">
            <h2 class="lp-h2">What you can do on Kalakaar</h2>
            <p class="lp-lead">The tools artists and producers use to find each other and work together.</p>
        </div>
        <div class="lp-features">
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

<!-- Audience -->
<section class="lp-section">
    <div class="container">
        <div class="lp-audience">
            <div class="lp-aud-card">
                <span class="lp-aud-tag">For artists</span>
                <h3 class="lp-aud-title">Get discovered for your craft</h3>
                <ul class="lp-list">
                    <li>Build a professional profile in minutes</li>
                    <li>Showcase your portfolio and real work</li>
                    <li>Receive hire requests directly from producers</li>
                    <li>Grow your reputation with verified reviews</li>
                </ul>
                <a href="/register" class="btn btn-primary">Create your profile</a>
            </div>
            <div class="lp-aud-card">
                <span class="lp-aud-tag">For producers</span>
                <h3 class="lp-aud-title">Find the perfect talent, fast</h3>
                <ul class="lp-list">
                    <li>Search and filter by field, skill and city</li>
                    <li>Review portfolios and ratings before you commit</li>
                    <li>Send structured hire requests with a budget</li>
                    <li>Coordinate everything in one place</li>
                </ul>
                <a href="/search" class="btn btn-primary">Browse talent</a>
            </div>
        </div>
    </div>
</section>

<!-- How it works -->
<section class="lp-section lp-section-alt">
    <div class="container">
        <div class="lp-section-head">
            <h2 class="lp-h2">How it works</h2>
            <p class="lp-lead">Three simple steps from sign-up to collaboration.</p>
        </div>
        <div class="lp-steps">
            <div class="lp-step"><div class="lp-step-num">1</div><h3>Create your account</h3><p>Sign up as an artist or a producer in under a minute.</p></div>
            <div class="lp-step"><div class="lp-step-num">2</div><h3>Build or browse</h3><p>Artists complete a profile; producers search and shortlist talent.</p></div>
            <div class="lp-step"><div class="lp-step-num">3</div><h3>Hire & collaborate</h3><p>Send a hire request, agree the brief, and get to work.</p></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="lp-cta-band">
    <div class="container lp-cta-inner">
        <h2 class="lp-h2">Ready to find your next collaborator?</h2>
        <p class="lp-lead">Join Kalakaar today — it takes less than a minute to get started.</p>
        <div class="lp-cta">
            <a href="/register" class="btn btn-primary btn-lg">Get started free</a>
            <a href="/artists" class="btn btn-ghost btn-lg">Browse artists</a>
        </div>
    </div>
</section>
