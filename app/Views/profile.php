<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>User Profile</h1>
<p>Details of the demo account currently logged into the system.</p>

<?php if (!empty($user)): ?>
    <div style="background: #f8f9fa; padding: 20px; border-radius: 6px; border-left: 4px solid #17a2b8;">
        <p><strong>ID:</strong> <?= esc($user['id']) ?></p>
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
        <p><strong>Email Address:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Account Created:</strong> <?= esc($user['created_at']) ?></p>
    </div>
<?php else: ?>
    <p>No user record found.</p>
<?php endif; ?>

<?= $this->endSection() ?>