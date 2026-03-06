<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="auth-shell">
    <div class="row g-4 align-items-stretch">
        <div class="col-lg-6">
            <section class="auth-panel">
                <div class="auth-kicker">
                    <i class="bi bi-shield-fill-check"></i>
                    Secure access
                </div>
                <h1 class="auth-title">Welcome back to <em>CI4 CRUD EXAM</em>.</h1>
                <p class="auth-copy fs-5">Sign in to continue managing records with a clean workflow, predictable feedback, and faster access to your latest entries.</p>

                <div class="auth-meta-grid">
                    <div class="auth-meta-card">
                        <p class="mb-1 fw-semibold">Project</p>
                        <p class="auth-meta mb-0">CI4 CRUD <em>EXAM</em></p>
                    </div>
                    <div class="auth-meta-card">
                        <p class="mb-1 fw-semibold">Developed by</p>
                        <p class="auth-meta mb-0">Carla <em>Gahol</em> and Deivid <em>Yap</em></p>
                    </div>
                    <div class="auth-meta-card">
                        <p class="mb-1 fw-semibold">Purpose</p>
                        <p class="auth-meta mb-0">Efficient record creation, review, editing, and deletion inside a single focused interface.</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-6">
            <section class="auth-card">
                <p class="eyebrow mb-2">Login</p>
                <h2 class="auth-title h3 text-dark mb-2">Access your <em>workspace</em></h2>
                <p class="helper-copy mb-4">Use your registered account to open the dashboard and continue your CRUD work.</p>

                <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" autocomplete="email" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg">Log in</button>
                    </div>
                </form>

                <div class="border-top pt-4">
                    <p class="mb-0 text-muted">Need an account? <a href="<?= base_url('register') ?>" class="fw-semibold text-decoration-none">Create one here</a>.</p>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
