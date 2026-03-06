<?php
$projectName = 'CI4 CRUD EXAM';
$developers = 'Carla Gahol & Deivid Yap';
$isLoggedIn = (bool) session('isLoggedIn');
$currentPath = trim((string) uri_string(), '/');
$pageTitleSection = trim((string) $this->renderSection('title'));
$pageTitle = $pageTitleSection !== '' ? $pageTitleSection . ' | ' . $projectName : $projectName;
$metaDescription = trim((string) $this->renderSection('meta_description'));
$metaDescription = $metaDescription !== ''
    ? $metaDescription
    : 'CI4 CRUD EXAM is a streamlined CodeIgniter 4 CRUD workspace for managing records with clarity and speed.';
$metaAuthor = trim((string) $this->renderSection('meta_author')) ?: $developers;
$pageHeader = trim((string) $this->renderSection('page_header'));
$pageActions = $this->renderSection('page_actions');
$navLinks = $this->renderSection('nav_links');
$navActions = $this->renderSection('nav_actions');
$styles = $this->renderSection('styles');
$scripts = $this->renderSection('scripts');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc($metaDescription) ?>">
    <meta name="author" content="<?= esc($metaAuthor) ?>">
    <title><?= esc($pageTitle) ?></title>
    <link rel="icon" type="image/svg+xml" href="<?= base_url('favicon.svg') ?>">
    <link rel="alternate icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <?= $styles ?>
</head>
<body class="app-shell d-flex flex-column">
    <a href="#main-content" class="visually-hidden-focusable position-absolute top-0 start-0 z-3 m-3 rounded-pill bg-white px-3 py-2 text-decoration-none shadow-sm">Skip to main content</a>

    <nav class="navbar navbar-expand-lg app-navbar sticky-top">
        <div class="container py-2">
            <a class="app-brand" href="<?= $isLoggedIn ? base_url('dashboard') : base_url('login') ?>">
                <span class="app-brand-mark" aria-hidden="true">
                    <i class="bi bi-grid-1x2-fill"></i>
                </span>
                <span class="app-brand-copy">
                    <span class="app-brand-title"><?= esc($projectName) ?></span>
                </span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-3 mb-lg-0 mt-3 mt-lg-0">
                    <?php if ($isLoggedIn): ?>
                        <li class="nav-item">
                            <a class="nav-link app-nav-link <?= ($currentPath === '' || $currentPath === 'dashboard') ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link app-nav-link <?= str_starts_with($currentPath, 'records') ? 'active' : '' ?>" href="<?= base_url('records') ?>">Records</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link app-nav-link <?= $currentPath === 'login' ? 'active' : '' ?>" href="<?= base_url('login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link app-nav-link <?= $currentPath === 'register' ? 'active' : '' ?>" href="<?= base_url('register') ?>">Register</a>
                        </li>
                    <?php endif; ?>
                    <?= $navLinks ?>
                </ul>

                <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2 gap-lg-3">
                    <?= $navActions ?>

                    <?php if ($isLoggedIn): ?>
                        <span class="user-chip">
                            <i class="bi bi-person-circle"></i>
                            <span><?= esc((string) session('name')) ?></span>
                        </span>
                        <a class="btn btn-outline-light btn-sm" href="<?= base_url('logout') ?>">
                            <i class="bi bi-door-open-fill me-1"></i>
                            Logout
                        </a>
                    <?php else: ?>
                        <a class="btn btn-outline-light btn-sm" href="<?= base_url('register') ?>">Create account</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main id="main-content" class="app-main flex-grow-1">
        <div class="container">
            <?php if ($pageHeader !== ''): ?>
                <header class="page-header-card">
                    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                        <div>
                            <h1 class="page-title"><?= $pageHeader ?></h1>
                            <p class="page-subtitle mb-0">Clear workflows for records, with less friction and quieter visual noise.</p>
                        </div>
                        <?php if (trim((string) $pageActions) !== ''): ?>
                            <div class="d-flex flex-wrap gap-2">
                                <?= $pageActions ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </header>
            <?php endif; ?>

            <div id="flash-messages-container" class="mb-4">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" data-autoclose="true">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                            <div><?= esc((string) session()->getFlashdata('success')) ?></div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                            <div><?= esc((string) session()->getFlashdata('error')) ?></div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="content-wrapper">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </main>

    <footer class="app-footer mt-auto py-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
            <div>
                <p class="mb-1 fw-semibold footer-brand">CI4 CRUD <em>EXAM</em></p>
                <p class="mb-0 footer-note small">Minimal record management built on CodeIgniter 4.</p>
            </div>
            <div class="text-md-end">
                <p class="mb-1 small footer-note">Developed by Carla <em>Gahol</em> &amp; Deivid <em>Yap</em></p>
                <p class="mb-0 small footer-note">&copy; <?= date('Y') ?> CI4 CRUD <em>EXAM</em></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-autoclose="true"]').forEach(function (alertElement) {
                window.setTimeout(function () {
                    if (!alertElement.classList.contains('show')) {
                        return;
                    }

                    bootstrap.Alert.getOrCreateInstance(alertElement).close();
                }, 4500);
            });
        });
    </script>
    <?= $scripts ?>
</body>
</html>
