<?= view('templates/header') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">AUTHENTICATION</p>
        <h1>Login</h1>
        <p class="subtitle">
            Sign in to manage tasks.
        </p>
    </div>
</section>

<div class="login-card">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert success-alert">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert error-alert">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert error-alert">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/login') ?>" method="post">

        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username') ?>"
                placeholder="Enter your username"
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
            >
        </div>

        <button type="submit" class="primary-button">
            Login
        </button>

    </form>

</div>

<?= view('templates/footer') ?>