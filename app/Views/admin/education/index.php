<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-graduation-cap text-primary me-2"></i>Education Records</h5>
    <a href="<?= base_url('admin/education/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add Education</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>Degree</th>
          <th>Field of Study</th>
          <th>Institution</th>
          <th>Year</th>
          <th>Grade/Score</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($educations)): ?>
          <?php foreach ($educations as $edu): ?>
            <tr>
              <td class="fw-semibold text-white"><?= esc($edu['degree']) ?></td>
              <td class="text-accent"><?= esc($edu['field_of_study']) ?></td>
              <td class="text-muted small"><?= esc($edu['institution']) ?></td>
              <td><span class="badge bg-secondary"><?= esc($edu['passing_year']) ?></span></td>
              <td><?= esc($edu['grade_score']) ?></td>
              <td><?= esc($edu['sort_order']) ?></td>
              <td>
                <a href="<?= base_url('admin/education/edit/' . $edu['id']) ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('admin/education/delete/' . $edu['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center text-muted py-4">No education records added yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
