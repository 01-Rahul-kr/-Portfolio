<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-code text-primary me-2"></i>Skills List</h5>
    <a href="<?= base_url('admin/skills/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add New Skill</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>Icon</th>
          <th>Skill Name</th>
          <th>Category</th>
          <th>Proficiency</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($skills)): ?>
          <?php foreach ($skills as $skill): ?>
            <tr>
              <td><i class="<?= esc($skill['icon']) ?> fs-4 text-primary"></i></td>
              <td class="fw-semibold text-white"><?= esc($skill['name']) ?></td>
              <td><span class="badge bg-secondary"><?= esc($skill['category']) ?></span></td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-primary" style="width: <?= esc($skill['percentage']) ?>%;"></div>
                  </div>
                  <span class="fw-bold text-accent small"><?= esc($skill['percentage']) ?>%</span>
                </div>
              </td>
              <td><?= esc($skill['sort_order']) ?></td>
              <td>
                <a href="<?= base_url('admin/skills/edit/' . $skill['id']) ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('admin/skills/delete/' . $skill['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted py-4">No skills added yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
