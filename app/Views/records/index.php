<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Records<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
Records
<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<a href="<?= base_url('records/new') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle-fill me-1"></i> Add record</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php $recordCount = count($records); ?>

<div class="section-card mb-4">
    <div class="section-header mb-0">
        <div>
            <h2 class="section-title h4 mb-2">Record <em>list</em></h2>
            <p class="section-copy mb-0">Browse, open, edit, or remove records from a single view.</p>
        </div>
        <div class="text-lg-end">
            <div class="metric-value fs-2 mb-1"><?= esc((string) $recordCount) ?></div>
            <p class="section-copy mb-0">Entries on this page</p>
        </div>
    </div>
</div>

<div class="table-card">
    <?php if ($records !== []): ?>
        <div class="d-none d-md-block table-scroll">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Title</th>
                        <th>Category</th>
                        <th>Remarks</th>
                        <th>Created</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td class="ps-4">
                                <a href="<?= base_url('records/' . $record['id']) ?>" class="text-decoration-none fw-semibold text-primary">
                                    <?= esc($record['title']) ?>
                                </a>
                            </td>
                            <td><span class="badge-soft"><?= esc($record['category']) ?></span></td>
                            <td class="text-muted"><?= esc($record['remarks']) ?></td>
                            <td class="text-muted small"><?= $record['created_at'] ? date('M j, Y g:i A', strtotime((string) $record['created_at'])) : 'N/A' ?></td>
                            <td class="text-end pe-4">
                                <div class="record-actions">
                                    <a href="<?= base_url('records/' . $record['id']) ?>" class="btn btn-outline-secondary btn-sm">View</a>
                                    <a href="<?= base_url('records/' . $record['id'] . '/edit') ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                    <form action="<?= base_url('records/' . $record['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to permanently delete this record?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-md-none record-mobile-list">
            <?php foreach ($records as $record): ?>
                <article class="record-mobile-card">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <a href="<?= base_url('records/' . $record['id']) ?>" class="text-decoration-none fw-semibold fs-5 text-primary">
                                <?= esc($record['title']) ?>
                            </a>
                            <p class="text-muted mb-0 mt-2"><?= esc($record['remarks']) ?></p>
                        </div>
                        <span class="badge-soft"><?= esc($record['category']) ?></span>
                    </div>

                    <div class="record-mobile-meta">
                        <div class="record-mobile-meta-item">
                            <span class="record-mobile-meta-label">Created</span>
                            <span class="text-muted small"><?= $record['created_at'] ? date('M j, Y g:i A', strtotime((string) $record['created_at'])) : 'N/A' ?></span>
                        </div>
                    </div>

                    <div class="record-mobile-actions">
                        <a href="<?= base_url('records/' . $record['id']) ?>" class="btn btn-outline-secondary btn-sm">View</a>
                        <a href="<?= base_url('records/' . $record['id'] . '/edit') ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="<?= base_url('records/' . $record['id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to permanently delete this record?');">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if ($pager !== null): ?>
            <div class="pt-4 custom-pagination">
                <?= $pager->links() ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="empty-state">
            <div class="empty-state-icon"><i class="bi bi-folder-fill"></i></div>
            <h2 class="h4 mb-2">No records found</h2>
            <p class="section-copy mb-3">Start by creating your first record so it appears in the list and dashboard.</p>
            <a href="<?= base_url('records/new') ?>" class="btn btn-primary btn-sm">Create record</a>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
