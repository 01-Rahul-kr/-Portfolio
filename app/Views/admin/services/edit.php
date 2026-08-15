<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-edit text-warning me-2"></i>Edit Service #<?= esc($service['id']) ?></h5>
    <a href="<?= base_url('admin/services') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/services/update/' . $service['id']) ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label text-muted small">Service Title *</label>
        <input type="text" name="title" class="form-control bg-dark text-white border-secondary" value="<?= esc($service['title']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">FontAwesome Icon Class *</label>
        <input type="text" name="icon" class="form-control bg-dark text-white border-secondary" value="<?= esc($service['icon']) ?>" required>
      </div>

      <div class="col-12">
        <label class="form-label text-muted small">Service Description *</label>
        <textarea name="description" class="form-control bg-dark text-white border-secondary" rows="4" required><?= esc($service['description']) ?></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label text-muted small">Sort Order</label>
        <input type="number" name="sort_order" class="form-control bg-dark text-white border-secondary" value="<?= esc($service['sort_order']) ?>">
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-warning px-4"><i class="fas fa-save me-1"></i> Update Service</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
