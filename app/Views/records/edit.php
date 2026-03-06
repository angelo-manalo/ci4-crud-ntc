<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Record<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
Edit <em>record</em>
<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<a href="<?= base_url('records/' . $record['id']) ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left-circle-fill me-1"></i> Back to details</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row g-4 align-items-start">
    <div class="col-lg-8">
        <div class="form-card">
            <div class="p-4 p-md-5">
                <form action="<?= base_url('records/' . $record['id']) ?>" method="post" novalidate>
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <?= $this->include('records/_form') ?>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <aside class="tip-card">
            <p class="eyebrow mb-2">Current entry</p>
            <h2 class="section-title h4 mb-3">Current <em>record</em></h2>
            <ul class="detail-list">
                <li>
                    <span class="detail-label">Record ID</span>
                    <span class="detail-value">#<?= esc((string) $record['id']) ?></span>
                </li>
                <li>
                    <span class="detail-label">Category</span>
                    <span class="detail-value"><?= esc($record['category']) ?></span>
                </li>
                <li>
                    <span class="detail-label">Last updated</span>
                    <span class="detail-value"><?= $record['updated_at'] ? esc(date('M j, Y g:i A', strtotime((string) $record['updated_at']))) : 'Not available' ?></span>
                </li>
            </ul>
        </aside>
    </div>
</div>
<?= $this->endSection() ?>
