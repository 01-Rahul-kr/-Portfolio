<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-edit text-warning me-2"></i>Edit Experience #<?= esc($experience['id']) ?></h5>
    <a href="<?= base_url('admin/experience') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/experience/update/' . $experience['id']) ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label text-muted small">Job Title *</label>
        <input type="text" name="job_title" class="form-control bg-dark text-white border-secondary" value="<?= esc($experience['job_title']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Company Name *</label>
        <input type="text" name="company" class="form-control bg-dark text-white border-secondary" value="<?= esc($experience['company']) ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label text-muted small">Location</label>
        <input type="text" name="location" class="form-control bg-dark text-white border-secondary" value="<?= esc($experience['location']) ?>">
      </div>

      <div class="col-md-4">
        <label class="form-label text-muted small">Start Date *</label>
        <input type="text" name="start_date" class="form-control bg-dark text-white border-secondary" value="<?= esc($experience['start_date']) ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label text-muted small">End Date</label>
        <input type="text" name="end_date" class="form-control bg-dark text-white border-secondary" value="<?= esc($experience['end_date']) ?>">
      </div>

      <div class="col-12">
        <label class="form-label text-muted small">Responsibilities (Pipe-separated |) *</label>
        <textarea name="responsibilities" class="form-control bg-dark text-white border-secondary" rows="4" required><?= esc($experience['responsibilities']) ?></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Sort Order</label>
        <input type="number" name="sort_order" class="form-control bg-dark text-white border-secondary" value="<?= esc($experience['sort_order']) ?>">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_current" value="1" id="currentCheck" <?= $experience['is_current'] == 1 ? 'checked' : '' ?>>
          <label class="form-check-label text-white" for="currentCheck">Is Current Position</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-warning px-4"><i class="fas fa-save me-1"></i> Update Experience</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
