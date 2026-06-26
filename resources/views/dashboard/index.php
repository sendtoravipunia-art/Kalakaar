<?php /** @var array $user */ ?>
<section class="container" style="padding:40px 0">
    <?= partial('partials.alerts') ?>

    <h1>Welcome, <?= e($user['name'] ?? 'there') ?> 👋</h1>
    <p class="muted" style="margin-bottom:24px">
        You are signed in as a <strong><?= e($user['role'] ?? '') ?></strong>.
    </p>

    <div class="card-grid">
        <?php if (($user['role'] ?? '') === 'artist'): ?>
            <div class="card"><h3>My Profile</h3><p>Complete your bio, skills and rate.</p><a class="btn btn-ghost btn-sm" href="/profile/edit">Edit</a></div>
            <div class="card"><h3>Hire Requests</h3><p>See producers who want to hire you.</p><a class="btn btn-ghost btn-sm" href="/hire-requests">View</a></div>
            <div class="card"><h3>Portfolio</h3><p>Add samples of your work.</p><a class="btn btn-ghost btn-sm" href="/portfolio">Manage</a></div>
        <?php else: ?>
            <div class="card"><h3>My Profile</h3><p>Set up your company details.</p><a class="btn btn-ghost btn-sm" href="/profile/edit">Edit</a></div>
            <div class="card"><h3>Find Talent</h3><p>Search artists by field and skill.</p><a class="btn btn-ghost btn-sm" href="/search">Search</a></div>
            <div class="card"><h3>My Hires</h3><p>Track artists you have hired.</p><a class="btn btn-ghost btn-sm" href="/hire-requests">View</a></div>
        <?php endif; ?>
    </div>
</section>
