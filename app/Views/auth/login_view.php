<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Tasks System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #883955;">Task Manager Login</h3>
            <p class="text-muted">Please sign in to manage tasks</p>
        </div>

        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger py-2"><?= session('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/login/auth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #6b2d42;">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #6b2d42;">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn text-white w-100 fw-bold py-2" style="background-color: #E18AAA;">Login</button>
        </form>
        <div class="text-center mt-3">
            <a href="<?= base_url('/') ?>" class="text-decoration-none text-muted small">&larr; Back to Welcome Page</a>
        </div>
    </div>
</body>
</html>