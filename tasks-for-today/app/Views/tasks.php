<?= view('templates/header') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">TASK MANAGEMENT</p>
        <h1>All Tasks</h1>
        <p class="subtitle">
            Complete list of scheduled tasks
        </p>
    </div>

    <div class="task-count">
        <strong><?= count($tasks) ?></strong>
        <span>Total Tasks</span>
    </div>
</section>

<?php if (session()->getFlashdata('success')): ?>

    <div class="alert success-alert">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>

<?php endif; ?>


<?php if (session()->get('logged_in')): ?>

    <div class="management-bar">

        <span>
            You are logged in and can manage tasks.
        </span>

        <a href="<?= base_url('/tasks/new') ?>" class="primary-button">
            + New Task
        </a>

    </div>

<?php endif; ?>

<div class="table-wrapper">

    <table class="task-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created</th>

                <?php if (session()->get('logged_in')): ?>
                    <th>Actions</th>
                <?php endif; ?>

            </tr>
        </thead>

        <tbody>

        <?php foreach ($tasks as $task): ?>

            <tr>

                <td>
                    #<?= esc($task['id']) ?>
                </td>

                <td class="task-title">
                    <?= esc($task['title']) ?>
                </td>

                <td>
                    <span class="status <?= esc($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </span>
                </td>

                <td>
                    <?= date('M d, Y', strtotime($task['task_date'])) ?>
                </td>

                <td>
                    <?= date('M d, Y', strtotime($task['created_at'])) ?>
                </td>
            
                <?php if (session()->get('logged_in')): ?>

                    <td class="actions">

                        <a
                            href="<?= base_url('/tasks/edit/' . $task['id']) ?>"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            action="<?= base_url('/tasks/delete/' . $task['id']) ?>"
                            method="post"
                            class="delete-form"
                            onsubmit="return confirm('Archive this task?');"
                        >

                        <?= csrf_field() ?>

                        <button type="submit" class="delete-button">
                            Delete
                        </button>

                    </form>

                </td>

            <?php endif; ?>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?= view('templates/footer') ?>