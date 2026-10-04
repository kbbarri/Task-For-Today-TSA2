<?= view('templates/header') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">TASK MANAGEMENT</p>

        <h1>
            <?= $task ? 'Edit Task' : 'New Task' ?>
        </h1>

        <p class="subtitle">
            <?= $task
                ? 'Update the selected task.'
                : 'Create a new task for your task list.' ?>
        </p>
    </div>
</section>

<div class="form-card">

    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert error-alert">

            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>

        </div>

    <?php endif; ?>

    <?php
        $action = $task
            ? base_url('/tasks/update/' . $task['id'])
            : base_url('/tasks');
    ?>

    <form action="<?= $action ?>" method="post">

        <?= csrf_field() ?>

        <div class="form-group">

            <label for="title">
                Task Title
            </label>

            <input
                type="text"
                id="title"
                name="title"
                maxlength="150"
                value="<?= old('title', $task['title'] ?? '') ?>"
                placeholder="Enter task title"
            >

        </div>

        <div class="form-group">

            <label for="status">
                Status
            </label>

            <?php
                $currentStatus = old(
                    'status',
                    $task['status'] ?? 'pending'
                );
            ?>

            <select id="status" name="status">

                <option
                    value="pending"
                    <?= $currentStatus === 'pending' ? 'selected' : '' ?>
                >
                    Pending
                </option>

                <option
                    value="completed"
                    <?= $currentStatus === 'completed' ? 'selected' : '' ?>
                >
                    Completed
                </option>

            </select>

        </div>

        <div class="form-group">

            <label for="task_date">
                Task Date
            </label>

            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date', $task['task_date'] ?? '') ?>"
            >

        </div>

        <div class="form-actions">

            <button type="submit" class="primary-button">
                <?= $task ? 'Update Task' : 'Create Task' ?>
            </button>

            <a href="<?= base_url('/tasks') ?>" class="secondary-button">
                Cancel
            </a>

        </div>

    </form>

</div>

<?= view('templates/footer') ?>