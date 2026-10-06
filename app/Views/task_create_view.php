<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm border-0 p-4">
            <h2 class="mb-4 fw-bold" style="color: #883955;">Create New Task</h2>

            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/tasks/store') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Task Title *</label>
                    <input type="text" name="title" class="form-control" value="<?= old('title') ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Task Date *</label>
                    <input type="date" name="task_date" class="form-control" value="<?= old('task_date') ?>" required>
                </div>

                <button type="submit" class="btn text-white fw-bold" style="background-color: #E18AAA;">Save Task</button>
                <a href="<?= base_url('/tasks') ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>