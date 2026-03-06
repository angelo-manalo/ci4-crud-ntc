<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Record Details<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
Record <em>details</em>
<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<a href="<?= base_url('records') ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left-circle-fill me-1"></i> Back to records</a>
<a href="<?= base_url('records/' . $record['id'] . '/edit') ?>" class="btn btn-primary btn-sm">Edit</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row g-4 align-items-start">
    <div class="col-lg-8">
        <div class="detail-card">
            <div class="detail-card-header">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-3">
                    <div>
                        <p class="eyebrow mb-2">Record #<?= esc((string) $record['id']) ?></p>
                        <h2 class="detail-title h2 mb-2"><?= esc($record['title']) ?></h2>
                        <p class="helper-copy mb-0">Full record information with key metadata and descriptive content in one place.</p>
                    </div>
                    <span class="badge-soft"><?= esc($record['category']) ?></span>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h3 class="h6 text-uppercase text-muted fw-bold">Remarks</h3>
                    <p class="mb-0"><?= esc($record['remarks']) ?></p>
                </div>
                <div class="col-12">
                    <h3 class="h6 text-uppercase text-muted fw-bold">Description</h3>
                    <div class="detail-body">
                        <div class="detail-prose"><?= nl2br(esc($record['description'])) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="detail-card mb-4">
            <div class="detail-header">
                <div>
                    <h2 class="section-title h4 mb-1">Record <em>metadata</em></h2>
                    <p class="section-copy mb-0">Useful details for audit and review.</p>
                </div>
            </div>

            <ul class="detail-list">
                <li>
                    <span class="detail-label">Category</span>
                    <span class="detail-value"><?= esc($record['category']) ?></span>
                </li>
                <li>
                    <span class="detail-label">Created</span>
                    <span class="detail-value"><?= $record['created_at'] ? esc(date('F j, Y g:i A', strtotime((string) $record['created_at']))) : 'N/A' ?></span>
                </li>
                <li>
                    <span class="detail-label">Updated</span>
                    <span class="detail-value"><?= $record['updated_at'] ? esc(date('F j, Y g:i A', strtotime((string) $record['updated_at']))) : 'N/A' ?></span>
                </li>
            </ul>
        </div>

        <div class="detail-card">
            <div class="detail-header">
                <div>
                    <h2 class="section-title h4 mb-1">Actions</h2>
                    <p class="section-copy mb-0">Update the record or remove it permanently.</p>
                </div>
            </div>

            <div class="d-grid gap-2">
                <a href="<?= base_url('records/' . $record['id'] . '/edit') ?>" class="btn btn-primary">Edit record</a>
                <form action="<?= base_url('records/' . $record['id']) ?>" method="post" onsubmit="return confirm('Delete this record permanently?');">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-outline-danger w-100">Delete record</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
