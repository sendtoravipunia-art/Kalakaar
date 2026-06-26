<?php /** @var array<int,string> $fields */ ?>
<section class="hero">
    <div class="container">
        <h1 class="hero-title">Where <span class="accent">Kalakaar</span> meet opportunity</h1>
        <p class="hero-sub">
            Artists of every field build a profile. Producers search, shortlist and hire — all in one place.
        </p>
        <div class="hero-cta">
            <a href="/register" class="btn btn-primary">Create your profile</a>
            <a href="/search" class="btn btn-ghost">Find talent</a>
        </div>
    </div>
</section>

<section class="fields">
    <div class="container">
        <h2 class="section-title">Talent across every field</h2>
        <div class="chip-grid">
            <?php foreach ($fields as $field): ?>
                <a class="chip" href="/search?field=<?= e(urlencode($field)) ?>"><?= e($field) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="how">
    <div class="container">
        <h2 class="section-title">How it works</h2>
        <div class="card-grid">
            <div class="card">
                <div class="card-num">1</div>
                <h3>Artists build a profile</h3>
                <p>Showcase your field, skills, portfolio and rate.</p>
            </div>
            <div class="card">
                <div class="card-num">2</div>
                <h3>Producers search</h3>
                <p>Filter by field, skill and budget to find the right fit.</p>
            </div>
            <div class="card">
                <div class="card-num">3</div>
                <h3>Hire &amp; collaborate</h3>
                <p>Send a hire request and assign the work directly.</p>
            </div>
        </div>
    </div>
</section>
