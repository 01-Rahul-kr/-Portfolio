<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-share-alt text-primary me-2"></i>Social Links</h5>
    <a href="<?= base_url('admin/social-links/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add Link</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>Icon</th>
          <th>Platform</th>
          <th>URL</th>
          <th>Active</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($social_links)): ?>
          <?php foreach ($social_links as $link): ?>
            <tr>
              <td><i class="<?= esc($link['icon']) ?> fs-4 text-accent"></i></td>
              <td class="fw-semibold text-white"><?= esc($link['platform']) ?></td>
              <td><a href="<?= esc($link['url']) ?>" target="_blank" class="text-info text-truncate d-inline-block" style="max-width: 250px;"><?= esc($link['url']) ?></a></td>
              <td>
                <?php if ($link['is_active'] == 1): ?>
                  <span class="badge bg-success">Active</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Disabled</span>
                <?php endif; ?>
              </td>
              <td><?= esc($link['sort_order']) ?></td>
              <td>
                <a href="<?= base_url('admin/social-links/edit/' . $link['id']) ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('admin/social-links/delete/' . $link['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted py-4">No social links configured.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
