<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-envelope-open text-info me-2"></i>View Message #<?= esc($msg['id']) ?></h5>
    <div>
      <a href="mailto:<?= esc($msg['email']) ?>" class="btn btn-primary btn-sm me-2"><i class="fas fa-reply me-1"></i> Reply via Email</a>
      <a href="<?= base_url('admin/messages') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-6">
      <div class="p-3 bg-dark rounded border border-secondary">
        <span class="text-muted small d-block">Sender Name</span>
        <strong class="text-white fs-6"><?= esc($msg['name']) ?></strong>
      </div>
    </div>

    <div class="col-md-6">
      <div class="p-3 bg-dark rounded border border-secondary">
        <span class="text-muted small d-block">Sender Email</span>
        <strong class="text-white fs-6"><?= esc($msg['email']) ?></strong>
      </div>
    </div>

    <div class="col-md-6">
      <div class="p-3 bg-dark rounded border border-secondary">
        <span class="text-muted small d-block">Phone Number</span>
        <strong class="text-white fs-6"><?= esc($msg['phone'] ?: 'N/A') ?></strong>
      </div>
    </div>

    <div class="col-md-6">
      <div class="p-3 bg-dark rounded border border-secondary">
        <span class="text-muted small d-block">Received Date</span>
        <strong class="text-white fs-6"><?= date('F d, Y \a\t h:i A', strtotime($msg['created_at'])) ?></strong>
      </div>
    </div>
  </div>

  <div class="p-4 bg-dark rounded border border-secondary">
    <h6 class="text-primary mb-2">Subject: <?= esc($msg['subject']) ?></h6>
    <hr class="border-secondary">
    <p class="text-light mb-0 style-message" style="white-space: pre-line; line-height: 1.7;"><?= esc($msg['message']) ?></p>
  </div>
</div>

<?= $this->endSection() ?>
