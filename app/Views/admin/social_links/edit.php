<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-edit text-warning me-2"></i>Edit Social Link #<?= esc($link['id']) ?></h5>
    <a href="<?= base_url('admin/social-links') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/social-links/update/' . $link['id']) ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label text-muted small">Platform Name *</label>
        <input type="text" name="platform" class="form-control bg-dark text-white border-secondary" value="<?= esc($link['platform']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">FontAwesome Icon Class *</label>
        <input type="text" name="icon" class="form-control bg-dark text-white border-secondary" value="<?= esc($link['icon']) ?>" required>
      </div>

      <div class="col-12">
        <label class="form-label text-muted small">Profile / Link URL *</label>
        <input type="url" name="url" class="form-control bg-dark text-white border-secondary" value="<?= esc($link['url']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Sort Order</label>
        <input type="number" name="sort_order" class="form-control bg-dark text-white border-secondary" value="<?= esc($link['sort_order']) ?>">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="activeCheck" <?= $link['is_active'] == 1 ? 'checked' : '' ?>>
          <label class="form-check-label text-white" for="activeCheck">Active / Visible</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-warning px-4"><i class="fas fa-save me-1"></i> Update Link</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
