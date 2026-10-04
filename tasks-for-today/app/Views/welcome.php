<?= view('templates/header') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">DAILY DASHBOARD</p>
        <h1>Tasks for Today</h1>
        <p class="subtitle">
            <?= date('l, F j, Y') ?>
        </p>
    </div>

    <div class="task-count">
        <strong><?= count($tasks) ?></strong>
        <span>Tasks Today</span>
    </div>
</section>

<?php if (!empty($tasks)): ?>

    <div class="task-grid">

        <?php foreach ($tasks as $task): ?>

            <article class="task-card">

                <div class="task-card-top">

                    <span class="status <?= esc($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </span>

                    <span class="task-id">
                        #<?= esc($task['id']) ?>
                    </span>

                </div>

                <h2><?= esc($task['title']) ?></h2>

                <p class="date">
                    <?= date('F j, Y', strtotime($task['task_date'])) ?>
                </p>

            </article>

        <?php endforeach; ?>

    </div>

<?php else: ?>

    <div class="empty-state">
        <h2>No tasks for today</h2>
        <p>You don't have any tasks scheduled for today.</p>
    </div>

<?php endif; ?>

<?= view('templates/footer') ?>