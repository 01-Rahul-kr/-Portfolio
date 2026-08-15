<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-concierge-bell text-primary me-2"></i>Services Offered</h5>
    <a href="<?= base_url('admin/services/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add Service</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>Icon</th>
          <th>Service Title</th>
          <th>Description</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($services)): ?>
          <?php foreach ($services as $service): ?>
            <tr>
              <td><i class="<?= esc($service['icon']) ?> fs-4 text-primary"></i></td>
              <td class="fw-semibold text-white"><?= esc($service['title']) ?></td>
              <td class="text-muted small" style="max-width: 350px;"><?= esc($service['description']) ?></td>
              <td><?= esc($service['sort_order']) ?></td>
              <td>
                <a href="<?= base_url('admin/services/edit/' . $service['id']) ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('admin/services/delete/' . $service['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center text-muted py-4">No services added yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
