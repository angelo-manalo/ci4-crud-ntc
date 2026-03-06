<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Register<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="auth-shell">
    <div class="row g-4 align-items-stretch">
        <div class="col-lg-6">
            <section class="auth-panel">
                <div class="auth-kicker">
                    <i class="bi bi-person-plus-fill"></i>
                    New account
                </div>
                <h1 class="auth-title">Create your access to the <em>workspace</em>.</h1>
                <p class="auth-copy fs-5">Register once, then move directly into the dashboard and record management tools without extra setup.</p>

                <div class="auth-meta-grid">
                    <div class="auth-meta-card">
                        <p class="mb-1 fw-semibold">Simple onboarding</p>
                        <p class="auth-meta mb-0">Only the essential account details are required to get started.</p>
                    </div>
                    <div class="auth-meta-card">
                        <p class="mb-1 fw-semibold">Clear validation</p>
                        <p class="auth-meta mb-0">Inline feedback helps you fix issues quickly and complete registration with less confusion.</p>
                    </div>
                    <div class="auth-meta-card">
                        <p class="mb-1 fw-semibold">Developed by</p>
                        <p class="auth-meta mb-0">Carla <em>Gahol</em> and Deivid <em>Yap</em></p>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-6">
            <section class="auth-card">
                <p class="eyebrow mb-2">Register</p>
                <h2 class="auth-title h3 text-dark mb-2">Set up your <em>account</em></h2>
                <p class="helper-copy mb-4">Fill in the form below to create your login credentials for CI4 CRUD EXAM.</p>

                <form action="<?= base_url('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" autocomplete="name" required autofocus>
                        <?php if (session('errors.name')) : ?>
                            <div class="text-danger small mt-1"><?= esc((string) session('errors.name')) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" autocomplete="email" required>
                        <?php if (session('errors.email')) : ?>
                            <div class="text-danger small mt-1"><?= esc((string) session('errors.email')) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
                        <div class="form-hint">Use at least 8 characters for a stronger password.</div>
                        <?php if (session('errors.password')) : ?>
                            <div class="text-danger small mt-1"><?= esc((string) session('errors.password')) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirm" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" autocomplete="new-password" required>
                        <?php if (session('errors.password_confirm')) : ?>
                            <div class="text-danger small mt-1"><?= esc((string) session('errors.password_confirm')) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg">Create account</button>
                    </div>
                </form>

                <div class="border-top pt-4">
                    <p class="mb-0 text-muted">Already registered? <a href="<?= base_url('login') ?>" class="fw-semibold text-decoration-none">Log in here</a>.</p>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
