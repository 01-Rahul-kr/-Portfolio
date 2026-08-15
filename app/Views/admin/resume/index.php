<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="row g-4">
  <div class="col-lg-6">
    <div class="admin-table-wrapper h-100">
      <h5 class="fw-bold mb-4"><i class="fas fa-file-pdf text-danger me-2"></i>Current Active Resume</h5>

      <div class="p-4 rounded-3 border text-center" style="background: var(--admin-input-bg); backdrop-filter: blur(12px);">
        <i class="fas fa-file-pdf display-1 text-danger mb-3"></i>
        <h5 class="mb-1"><?= esc($resume['file_name'] ?? 'Rahul_Kumar_Resume.pdf') ?></h5>
        <p class="text-muted small mb-3">File Size: <?= esc($resume['file_size'] ?? 'Unknown') ?></p>

        <a href="<?= base_url('resume/download') ?>" class="btn btn-outline-primary"><i class="fas fa-download me-1"></i> Download Resume</a>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="admin-table-wrapper h-100">
      <h5 class="fw-bold mb-4"><i class="fas fa-upload text-primary me-2"></i>Upload New Resume</h5>

      <form action="<?= base_url('admin/resume/upload') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-4">
          <label class="form-label">Select Resume File (PDF, DOC, DOCX) *</label>
          <input type="file" name="resume_file" class="form-control" accept=".pdf,.doc,.docx" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2"><i class="fas fa-cloud-upload-alt me-2"></i> Upload & Replace Resume</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
