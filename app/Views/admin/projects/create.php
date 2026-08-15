<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-plus-circle text-primary me-2"></i>Add New Project</h5>
    <a href="<?= base_url('admin/projects') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/projects/store') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-8">
        <label class="form-label">Project Title *</label>
        <input type="text" name="title" class="form-control" placeholder="Enterprise E-Commerce Portal" value="<?= old('title') ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Category *</label>
        <select name="category" class="form-select" required>
          <option value="PHP">PHP</option>
          <option value="CI4" selected>CI4 (CodeIgniter 4)</option>
          <option value="Bootstrap">Bootstrap</option>
          <option value="MySQL">MySQL</option>
          <option value="JavaScript">JavaScript</option>
        </select>
      </div>

      <div class="col-12">
        <label class="form-label">Project Description *</label>
        <textarea name="description" class="form-control" rows="4" required><?= old('description') ?></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Technologies Used (Comma-separated) *</label>
        <input type="text" name="technologies" class="form-control" placeholder="PHP 8, CodeIgniter 4, MySQL, Bootstrap 5, AJAX" value="<?= old('technologies') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="1">
      </div>

      <div class="col-md-6">
        <label class="form-label">GitHub Repository Link</label>
        <input type="url" name="github_link" class="form-control" placeholder="https://github.com/rahulkumar/project" value="<?= old('github_link') ?>">
      </div>

      <div class="col-md-6">
        <label class="form-label">Live Demo URL</label>
        <input type="url" name="demo_link" class="form-control" placeholder="https://demo.com" value="<?= old('demo_link') ?>">
      </div>

      <div class="col-md-8">
        <label class="form-label">Project Screenshot / Image</label>
        <input type="file" name="image" class="form-control image-preview-input" accept="image/*">
        <div class="mt-2">
          <img src="" alt="Project Preview" class="image-preview-target" style="max-width: 140px; border-radius: 12px; border: 1px solid var(--card-border); display: none;">
        </div>
      </div>

      <div class="col-md-4 d-flex align-items-center mt-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredCheck" checked>
          <label class="form-check-label text-white" for="featuredCheck">Feature on Homepage</label>
        </div>
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Save Project</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
