<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-plus-circle text-primary me-2"></i>Add Experience Record</h5>
    <a href="<?= base_url('admin/experience') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/experience/store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Job Title *</label>
        <input type="text" name="job_title" class="form-control" placeholder="PHP Developer" value="<?= old('job_title') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Company Name *</label>
        <input type="text" name="company" class="form-control" placeholder="Suropriyo Enterprises Private Limited" value="<?= old('company') ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" placeholder="India" value="<?= old('location', 'West Bengal, India') ?>">
      </div>

      <div class="col-md-4">
        <label class="form-label">Start Date *</label>
        <input type="text" name="start_date" class="form-control" placeholder="2023" value="<?= old('start_date') ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">End Date</label>
        <input type="text" name="end_date" class="form-control" placeholder="Present" value="<?= old('end_date', 'Present') ?>">
      </div>

      <div class="col-12">
        <label class="form-label">Responsibilities (Pipe-separated | for bullet points) *</label>
        <textarea name="responsibilities" class="form-control" rows="4" placeholder="Developing Web Applications|Bug Fixing|Database Design|API Integration|Code Optimization|MVC Development" required><?= old('responsibilities') ?></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="1">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_current" value="1" id="currentCheck" checked>
          <label class="form-check-label text-white" for="currentCheck">Is Current Position</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Save Experience</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
