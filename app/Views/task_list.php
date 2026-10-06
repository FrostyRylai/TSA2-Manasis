<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>All Tasks</h1>
<p>Complete overview of all tasks sorted by date.</p>

<?php if (!empty($tasks) && is_array($tasks)): ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Title</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created At</th>
                <?php if (session()->get('logged_in')): ?>
                    <th>Action</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td>
                    <span class="badge badge-<?= strtolower($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </span>
                </td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
                
                <?php if (session()->get('logged_in')): ?>
                    <td>
                        <a href="<?= base_url('/tasks/delete/' . $task['id']) ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Are you sure you want to delete this task?')">
                           Delete
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tasks found in the database.</p>
<?php endif; ?>

<?= $this->endSection() ?>