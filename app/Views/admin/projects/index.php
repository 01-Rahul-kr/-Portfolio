<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-folder-open text-primary me-2"></i>Projects List</h5>
    <a href="<?= base_url('admin/projects/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add New Project</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>Preview</th>
          <th>Title</th>
          <th>Category</th>
          <th>Technologies</th>
          <th>Featured</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($projects)): ?>
          <?php foreach ($projects as $project): ?>
            <tr>
              <td>
                <img src="<?= base_url($project['image']) ?>" alt="Preview" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;">
              </td>
              <td class="fw-semibold text-white"><?= esc($project['title']) ?></td>
              <td><span class="badge bg-primary"><?= esc($project['category']) ?></span></td>
              <td class="text-muted small"><?= esc($project['technologies']) ?></td>
              <td>
                <?php if ($project['is_featured'] == 1): ?>
                  <span class="badge bg-success">Yes</span>
                <?php else: ?>
                  <span class="badge bg-secondary">No</span>
                <?php endif; ?>
              </td>
              <td><?= esc($project['sort_order']) ?></td>
              <td>
                <a href="<?= base_url('admin/projects/edit/' . $project['id']) ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('admin/projects/delete/' . $project['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center text-muted py-4">No projects added yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
