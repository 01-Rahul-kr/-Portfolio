<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-plus-circle text-primary me-2"></i>Add New Skill</h5>
    <a href="<?= base_url('admin/skills') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/skills/store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label text-muted small">Skill Name *</label>
        <input type="text" name="name" class="form-control bg-dark text-white border-secondary" placeholder="CodeIgniter 4" value="<?= old('name') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Category *</label>
        <select name="category" class="form-select bg-dark text-white border-secondary" required>
          <option value="Backend" selected>Backend</option>
          <option value="Frontend">Frontend</option>
          <option value="Database">Database</option>
          <option value="Tools">Tools</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Percentage (0-100) *</label>
        <input type="number" name="percentage" class="form-control bg-dark text-white border-secondary" min="0" max="100" placeholder="90" value="<?= old('percentage', 85) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">FontAwesome Icon Class *</label>
        <input type="text" name="icon" class="form-control bg-dark text-white border-secondary" placeholder="fas fa-fire or fab fa-php" value="<?= old('icon', 'fas fa-code') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Sort Order</label>
        <input type="number" name="sort_order" class="form-control bg-dark text-white border-secondary" value="1">
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Save Skill</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
