<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<a href="<?= base_url('records') ?>" class="btn btn-outline-primary btn-sm">
    <i class="bi bi-grid-3x3-gap-fill me-1"></i>
    View records
</a>
<a href="<?= base_url('records/new') ?>" class="btn btn-primary btn-sm">
    <i class="bi bi-plus-circle-fill me-1"></i>
    New record
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
$totalRecords = $totalRecords ?? 0;
$latestRecord = $latestRecord ?? null;
$recentRecords = $recentRecords ?? [];
?>

<div class="hero-card mb-4">
    <div class="row align-items-center g-4">
        <div class="col-lg-8">
            <p class="eyebrow mb-3">Dashboard</p>
            <h2 class="hero-title">Everything <em>important</em>, in one place.</h2>
            <p class="hero-copy fs-5 mb-4">Review recent activity, open records quickly, and move into create or edit flows with a calmer, more readable layout.</p>
            <div class="d-flex flex-wrap gap-2">
                <a href="<?= base_url('records') ?>" class="btn btn-primary">
                    <i class="bi bi-folder-fill me-1"></i>
                    Open records
                </a>
                <a href="<?= base_url('records/new') ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Create a record
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="section-card h-100">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="hero-icon"><i class="bi bi-person-badge-fill"></i></span>
                    <div>
                        <p class="mb-1 text-muted small fw-semibold">Signed in as</p>
                        <h3 class="h4 mb-0"><?= esc((string) session('name')) ?></h3>
                    </div>
                </div>
                <p class="helper-copy mb-0">Start here to review the current state of your records.</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="metric-card">
            <div class="metric-icon"><i class="bi bi-database-fill"></i></div>
            <div class="metric-value"><?= esc((string) $totalRecords) ?></div>
            <h3 class="metric-label h5 mb-2">Total records</h3>
            <p class="metric-copy mb-4">Current number of stored entries.</p>
            <a href="<?= base_url('records') ?>" class="btn btn-outline-primary btn-sm">Browse list</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="metric-card">
            <div class="metric-icon"><i class="bi bi-clock-fill"></i></div>
            <div class="metric-value fs-3"><?= esc($latestRecord['title'] ?? 'None yet') ?></div>
            <h3 class="metric-label h5 mb-2">Latest entry</h3>
            <p class="metric-copy mb-4">
                <?php if ($latestRecord !== null): ?>
                    Added on <?= esc(date('M j, Y g:i A', strtotime((string) $latestRecord['created_at']))) ?>.
                <?php else: ?>
                    No records have been created yet.
                <?php endif; ?>
            </p>
            <a href="<?= base_url('records/new') ?>" class="btn btn-outline-primary btn-sm">Add record</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="metric-card">
            <div class="metric-icon"><i class="bi bi-clipboard2-check-fill"></i></div>
            <div class="metric-value"><?= esc((string) count($recentRecords)) ?></div>
            <h3 class="metric-label h5 mb-2">Recent items</h3>
            <p class="metric-copy mb-4">Latest entries available for quick review.</p>
            <a href="#recent-records" class="btn btn-outline-primary btn-sm">Review latest</a>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-lg-7" id="recent-records">
        <div class="table-card h-100">
            <div class="table-header">
                <div>
                    <h2 class="section-title h4 mb-1">Recent <em>records</em></h2>
                    <p class="section-copy mb-0">Newest entries, available at a glance.</p>
                </div>
                <a href="<?= base_url('records') ?>" class="btn btn-outline-primary btn-sm">Full list</a>
            </div>

            <?php if ($recentRecords !== []): ?>
                <div class="d-none d-md-block table-scroll">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentRecords as $record): ?>
                                <tr>
                                    <td class="fw-semibold"><?= esc($record['title']) ?></td>
                                    <td><span class="badge-soft"><?= esc($record['category']) ?></span></td>
                                    <td class="text-muted small"><?= esc(date('M j, Y g:i A', strtotime((string) $record['created_at']))) ?></td>
                                    <td class="text-end">
                                        <a href="<?= base_url('records/' . $record['id']) ?>" class="btn btn-outline-secondary btn-sm">Open</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-md-none recent-mobile-list">
                    <?php foreach ($recentRecords as $record): ?>
                        <article class="recent-mobile-card">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div>
                                    <h3 class="h5 mb-1"><?= esc($record['title']) ?></h3>
                                    <span class="badge-soft"><?= esc($record['category']) ?></span>
                                </div>
                                <a href="<?= base_url('records/' . $record['id']) ?>" class="btn btn-outline-secondary btn-sm">Open</a>
                            </div>

                            <div class="recent-mobile-meta">
                                <div class="recent-mobile-meta-item">
                                    <span class="recent-mobile-meta-label">Created</span>
                                    <span class="text-muted small"><?= esc(date('M j, Y g:i A', strtotime((string) $record['created_at']))) ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-state-icon"><i class="bi bi-inbox-fill"></i></div>
                    <h3 class="h5 mb-2">No records yet</h3>
                    <p class="section-copy mb-3">Create your first entry to populate the recent activity area.</p>
                    <a href="<?= base_url('records/new') ?>" class="btn btn-primary btn-sm">Create first record</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="section-card h-100">
            <div>
                <h2 class="section-title h4 mb-2">Overview <em>snapshot</em></h2>
                <p class="section-copy mb-4">A quick summary of the current workspace.</p>
            </div>
            <ul class="quick-list">
                <li>
                    <span class="quick-list-label">Project</span>
                    <span class="quick-list-value">CI4 CRUD <em>EXAM</em></span>
                </li>
                <li>
                    <span class="quick-list-label">Developers</span>
                    <span class="quick-list-value">Carla <em>Gahol</em><br>Deivid <em>Yap</em></span>
                </li>
                <li>
                    <span class="quick-list-label">Latest category</span>
                    <span class="quick-list-value"><?= esc($latestRecord['category'] ?? 'No data') ?></span>
                </li>
                <li>
                    <span class="quick-list-label">Recommended next step</span>
                    <span class="quick-list-value"><?= $totalRecords > 0 ? 'Review or update an existing record' : 'Create your first record' ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
