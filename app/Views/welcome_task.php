<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Today's Tasks (<?= date('F d, Y') ?>)</h1>
<p>Here are your tasks scheduled specifically for today.</p>

<?php if (!empty($tasks) && is_array($tasks)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Title</th>
                <th>Status</th>
                <th>Date</th>
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tasks scheduled for today!</p>
<?php endif; ?>

<?= $this->endSection() ?>