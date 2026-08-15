<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-edit text-warning me-2"></i>Edit Skill #<?= esc($skill['id']) ?></h5>
    <a href="<?= base_url('admin/skills') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/skills/update/' . $skill['id']) ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label text-muted small">Skill Name *</label>
        <input type="text" name="name" class="form-control bg-dark text-white border-secondary" value="<?= esc($skill['name']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Category *</label>
        <select name="category" class="form-select bg-dark text-white border-secondary" required>
          <option value="Backend" <?= $skill['category'] === 'Backend' ? 'selected' : '' ?>>Backend</option>
          <option value="Frontend" <?= $skill['category'] === 'Frontend' ? 'selected' : '' ?>>Frontend</option>
          <option value="Database" <?= $skill['category'] === 'Database' ? 'selected' : '' ?>>Database</option>
          <option value="Tools" <?= $skill['category'] === 'Tools' ? 'selected' : '' ?>>Tools</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Percentage (0-100) *</label>
        <input type="number" name="percentage" class="form-control bg-dark text-white border-secondary" min="0" max="100" value="<?= esc($skill['percentage']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">FontAwesome Icon Class *</label>
        <input type="text" name="icon" class="form-control bg-dark text-white border-secondary" value="<?= esc($skill['icon']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Sort Order</label>
        <input type="number" name="sort_order" class="form-control bg-dark text-white border-secondary" value="<?= esc($skill['sort_order']) ?>">
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-warning px-4"><i class="fas fa-save me-1"></i> Update Skill</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
