<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-envelope text-primary me-2"></i>Contact Messages Inbox</h5>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Sender Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Subject</th>
          <th>Received Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($messages)): ?>
          <?php foreach ($messages as $msg): ?>
            <tr>
              <td>#<?= esc($msg['id']) ?></td>
              <td class="fw-semibold text-white"><?= esc($msg['name']) ?></td>
              <td><?= esc($msg['email']) ?></td>
              <td><?= esc($msg['phone'] ?: 'N/A') ?></td>
              <td><?= esc($msg['subject']) ?></td>
              <td class="text-muted small"><?= date('M d, Y H:i', strtotime($msg['created_at'])) ?></td>
              <td>
                <?php if ($msg['is_read'] == 1): ?>
                  <span class="badge bg-secondary">Read</span>
                <?php else: ?>
                  <span class="badge bg-warning text-dark">Unread</span>
                <?php endif; ?>
              </td>
              <td>
                <a href="<?= base_url('admin/messages/view/' . $msg['id']) ?>" class="btn btn-sm btn-info me-1"><i class="fas fa-eye"></i> Read</a>
                <a href="<?= base_url('admin/messages/delete/' . $msg['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="8" class="text-center text-muted py-4">No contact messages in inbox.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
