<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title><?= lang('Errors.whoops') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body class="app-shell d-flex align-items-center">
    <main class="container py-5">
        <section class="hero-card mx-auto" style="max-width: 760px;">
            <p class="eyebrow mb-3">CI4 CRUD EXAM</p>
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
                <div>
                    <h1 class="hero-title mb-3"><?= lang('Errors.whoops') ?></h1>
                    <h2 class="h3 fw-bold mb-3">Something interrupted the current workflow.</h2>
                    <p class="hero-copy mb-4"><?= lang('Errors.weHitASnag') ?></p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?= base_url('/') ?>" class="btn btn-primary">Return to dashboard</a>
                        <a href="<?= base_url('records') ?>" class="btn btn-outline-secondary">Open records</a>
                    </div>
                </div>
                <div class="section-card text-center" style="min-width: 200px;">
                    <div class="empty-state-icon mx-auto"><i class="bi bi-gear-fill"></i></div>
                    <p class="fw-semibold mb-1">Temporary issue</p>
                    <p class="section-copy mb-0">Try the previous action again after returning to a stable page.</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
