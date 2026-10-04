<?= view('templates/header') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">USER INFORMATION</p>
        <h1>Profile</h1>
        <p class="subtitle">
            Demo user registered in the system
        </p>
    </div>
</section>

<?php if ($user): ?>

<div class="profile-card">

    <div class="avatar">
        <?= strtoupper(substr($user['full_name'], 0, 1)) ?>
    </div>

    <div class="profile-info">

        <p class="eyebrow">DEMO USER</p>

        <h2>
            <?= esc($user['full_name']) ?>
        </h2>

        <div class="profile-details">

            <div>
                <span>Username</span>
                <strong><?= esc($user['username']) ?></strong>
            </div>

            <div>
                <span>Email</span>
                <strong><?= esc($user['email']) ?></strong>
            </div>

            <div>
                <span>Member Since</span>
                <strong>
                    <?= date('F j, Y', strtotime($user['created_at'])) ?>
                </strong>
            </div>

        </div>

    </div>

</div>

<?php else: ?>

<div class="empty-state">
    <h2>User not found</h2>
</div>

<?php endif; ?>

<?= view('templates/footer') ?>