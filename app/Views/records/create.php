<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Create Record<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
Create <em>record</em>
<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<a href="<?= base_url('records') ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left-circle-fill me-1"></i> Back to records</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row g-4 align-items-start">
    <div class="col-lg-8">
        <div class="form-card">
            <div class="p-4 p-md-5">
                <form action="<?= base_url('records') ?>" method="post" novalidate>
                    <?= csrf_field() ?>
                    <?= $this->include('records/_form') ?>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <aside class="tip-card">
            <p class="eyebrow mb-2">Guide</p>
            <h2 class="section-title h4 mb-3">Before you <em>save</em></h2>
            <ul class="tip-list">
                <li>
                    <span class="detail-label">Title</span>
                    <span class="detail-value">Make it easy to recognize in the records table.</span>
                </li>
                <li>
                    <span class="detail-label">Category</span>
                    <span class="detail-value">Keep labels consistent so similar items stay grouped.</span>
                </li>
                <li>
                    <span class="detail-label">Description</span>
                    <span class="detail-value">Add enough context so another user can understand the entry quickly.</span>
                </li>
            </ul>
        </aside>
    </div>
</div>
<?= $this->endSection() ?>
