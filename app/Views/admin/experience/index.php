<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-briefcase text-primary me-2"></i>Experience Timeline</h5>
    <a href="<?= base_url('admin/experience/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add Experience</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>Job Title</th>
          <th>Company</th>
          <th>Duration</th>
          <th>Current</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($experiences)): ?>
          <?php foreach ($experiences as $exp): ?>
            <tr>
              <td class="fw-semibold text-white"><?= esc($exp['job_title']) ?></td>
              <td><?= esc($exp['company']) ?></td>
              <td class="text-muted small"><?= esc($exp['start_date']) ?> - <?= esc($exp['end_date']) ?></td>
              <td>
                <?php if ($exp['is_current'] == 1): ?>
                  <span class="badge bg-success">Current Role</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Past Role</span>
                <?php endif; ?>
              </td>
              <td><?= esc($exp['sort_order']) ?></td>
              <td>
                <a href="<?= base_url('admin/experience/edit/' . $exp['id']) ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('admin/experience/delete/' . $exp['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted py-4">No experience records added yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
