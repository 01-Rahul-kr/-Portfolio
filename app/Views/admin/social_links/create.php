<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-plus-circle text-primary me-2"></i>Add Social Link</h5>
    <a href="<?= base_url('admin/social-links') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/social-links/store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Platform Name *</label>
        <input type="text" name="platform" class="form-control" placeholder="LinkedIn" value="<?= old('platform') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">FontAwesome Icon Class *</label>
        <input type="text" name="icon" class="form-control" placeholder="fab fa-linkedin-in" value="<?= old('icon', 'fab fa-linkedin-in') ?>" required>
      </div>

      <div class="col-12">
        <label class="form-label">Profile / Link URL *</label>
        <input type="url" name="url" class="form-control" placeholder="https://linkedin.com/in/rahul-kumar" value="<?= old('url') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="1">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="activeCheck" checked>
          <label class="form-check-label text-white" for="activeCheck">Active / Visible</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Save Social Link</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
