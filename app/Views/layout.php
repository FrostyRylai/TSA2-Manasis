<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today Management System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff0f5; 
            color: #4a4a4a;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(255, 182, 193, 0.4);
        }
        h2 {
            color: #d87093; 
            border-bottom: 2px solid #ffc0cb;
            padding-bottom: 10px;
        }
        nav {
            margin-bottom: 25px;
            background-color: #ffe4e1; 
            padding: 12px 20px;
            border-radius: 8px;
        }
        nav a {
            text-decoration: none;
            color: #c71585;
            font-weight: bold;
            margin-right: 20px;
        }
        nav a:hover {
            color: #ff1493;
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ffb6c1; 
            text-align: left;
        }
        th {
            background-color: #ffb6c1; 
            color: #5c0632;
        }
        tr:nth-child(even) {
            background-color: #fff5f8; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tasks for Today Management System</h2>
        
        <nav class="mb-4">
    <a href="<?= base_url('/') ?>" class="me-3">Today's Tasks</a>
    <a href="<?= base_url('/tasks') ?>" class="me-3">All Tasks</a>
    <a href="<?= base_url('/profile') ?>" class="me-3">Profile</a>
    <a href="<?= base_url('/about') ?>" class="me-3">About</a>

    <?php if (session()->get('logged_in')): ?>
        <a href="<?= base_url('/tasks/new') ?>" class="me-3 fw-bold text-success">+ Add New Task</a>
        <a href="<?= base_url('/logout') ?>" class="text-danger">Logout (<?= session()->get('username') ?>)</a>
    <?php else: ?>
        <a href="<?= base_url('/login') ?>" class="fw-bold text-primary">Login</a>
    <?php endif; ?>
</nav>

        <?= $this->renderSection('content') ?>
    </div>

</body>
</html>