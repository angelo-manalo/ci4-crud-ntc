<?php
$errors = $errors ?? [];
$record = $record ?? [];
$isEdit = ! empty($record['id']);

$fieldValue = static function (string $field, string $fallback = '') use ($record): string {
    return (string) old($field, $record[$field] ?? $fallback);
};

$fieldError = static function (string $field) use ($errors): ?string {
    return $errors[$field] ?? null;
};
?>

<div class="form-card-header">
    <h2 class="form-title h4 mb-2"><?= $isEdit ? 'Update record <em>information</em>' : 'Enter record <em>information</em>' ?></h2>
    <p class="helper-copy mb-0">Keep the details concise and clear so records stay easy to scan, review, and maintain later.</p>
</div>

<div class="row g-4">
    <div class="col-12">
        <label for="title" class="form-label">Title</label>
        <input
            type="text"
            class="form-control<?= $fieldError('title') ? ' is-invalid' : '' ?>"
            id="title"
            name="title"
            value="<?= esc($fieldValue('title')) ?>"
            placeholder="Enter a record title"
            maxlength="255"
            required
            autofocus
            autocomplete="off"
        >
        <div class="field-note">Use a short, specific title that makes the record easy to identify in lists.</div>
        <?php if ($fieldError('title')): ?>
            <div class="invalid-feedback"><?= esc($fieldError('title')) ?></div>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <label for="category" class="form-label">Category</label>
        <input
            type="text"
            class="form-control<?= $fieldError('category') ? ' is-invalid' : '' ?>"
            id="category"
            name="category"
            value="<?= esc($fieldValue('category')) ?>"
            placeholder="Enter a category"
            maxlength="100"
            required
            autocomplete="off"
        >
        <div class="field-note">Group similar records under the same category for easier browsing.</div>
        <?php if ($fieldError('category')): ?>
            <div class="invalid-feedback"><?= esc($fieldError('category')) ?></div>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <label for="remarks" class="form-label">Remarks</label>
        <input
            type="text"
            class="form-control<?= $fieldError('remarks') ? ' is-invalid' : '' ?>"
            id="remarks"
            name="remarks"
            value="<?= esc($fieldValue('remarks')) ?>"
            placeholder="Add a short note"
            maxlength="255"
            required
            autocomplete="off"
        >
        <div class="field-note">A one-line summary helps users understand the record before opening it.</div>
        <?php if ($fieldError('remarks')): ?>
            <div class="invalid-feedback"><?= esc($fieldError('remarks')) ?></div>
        <?php endif; ?>
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea
            class="form-control<?= $fieldError('description') ? ' is-invalid' : '' ?>"
            id="description"
            name="description"
            rows="6"
            placeholder="Write a detailed description for this record"
            required
        ><?= esc($fieldValue('description')) ?></textarea>
        <div class="field-note">Use the description for the full context, details, and any information that would not fit in remarks.</div>
        <?php if ($fieldError('description')): ?>
            <div class="invalid-feedback"><?= esc($fieldError('description')) ?></div>
        <?php endif; ?>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 border-top pt-4 mt-4">
    <a href="<?= base_url('records') ?>" class="btn btn-outline-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary px-4">
        <?= $isEdit ? 'Update Record' : 'Save Record' ?>
    </button>
</div>
