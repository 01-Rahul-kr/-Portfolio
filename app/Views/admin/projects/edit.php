<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-edit text-warning me-2"></i>Edit Project #<?= esc($project['id']) ?></h5>
    <a href="<?= base_url('admin/projects') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/projects/update/' . $project['id']) ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-8">
        <label class="form-label">Project Title *</label>
        <input type="text" name="title" class="form-control" value="<?= esc($project['title']) ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Category *</label>
        <select name="category" class="form-select" required>
          <option value="PHP" <?= $project['category'] === 'PHP' ? 'selected' : '' ?>>PHP</option>
          <option value="CI4" <?= $project['category'] === 'CI4' ? 'selected' : '' ?>>CI4 (CodeIgniter 4)</option>
          <option value="Bootstrap" <?= $project['category'] === 'Bootstrap' ? 'selected' : '' ?>>Bootstrap</option>
          <option value="MySQL" <?= $project['category'] === 'MySQL' ? 'selected' : '' ?>>MySQL</option>
          <option value="JavaScript" <?= $project['category'] === 'JavaScript' ? 'selected' : '' ?>>JavaScript</option>
        </select>
      </div>

      <div class="col-12">
        <label class="form-label">Project Description *</label>
        <textarea name="description" class="form-control" rows="4" required><?= esc($project['description']) ?></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Technologies Used *</label>
        <input type="text" name="technologies" class="form-control" value="<?= esc($project['technologies']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="<?= esc($project['sort_order']) ?>">
      </div>

      <div class="col-md-6">
        <label class="form-label">GitHub Link</label>
        <input type="url" name="github_link" class="form-control" value="<?= esc($project['github_link']) ?>">
      </div>

      <div class="col-md-6">
        <label class="form-label">Live Demo Link</label>
        <input type="url" name="demo_link" class="form-control" value="<?= esc($project['demo_link']) ?>">
      </div>

      <div class="col-md-8">
        <label class="form-label">Update Image (Optional)</label>
        <input type="file" name="image" class="form-control image-preview-input" accept="image/*">
      </div>

      <div class="col-md-4 d-flex align-items-center mt-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredCheck" <?= $project['is_featured'] == 1 ? 'checked' : '' ?>>
          <label class="form-check-label text-white" for="featuredCheck">Feature on Homepage</label>
        </div>
      </div>

      <div class="col-12 mt-2">
        <div class="text-muted small mb-1">Current Image Preview:</div>
        <img src="<?= base_url($project['image']) ?>" alt="Current Image" class="image-preview-target" style="max-width: 150px; border-radius: 8px;">
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-warning px-4"><i class="fas fa-save me-1"></i> Update Project</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
