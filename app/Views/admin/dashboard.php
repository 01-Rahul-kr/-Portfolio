<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<!-- Stat Widgets Grid -->
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon"><i class="fas fa-folder-open"></i></div>
      <div>
        <div class="stat-number"><?= esc($total_projects) ?></div>
        <div class="stat-label">Projects Published</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon" style="color: #22D3EE; background: rgba(34, 211, 238, 0.12);"><i class="fas fa-code"></i></div>
      <div>
        <div class="stat-number"><?= esc($total_skills) ?></div>
        <div class="stat-label">Skills Listed</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon" style="color: #F59E0B; background: rgba(245, 158, 11, 0.12);"><i class="fas fa-envelope"></i></div>
      <div>
        <div class="stat-number"><?= esc($total_messages) ?></div>
        <div class="stat-label">Total Messages (<?= esc($unread_messages) ?> Unread)</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon" style="color: #10B981; background: rgba(16, 185, 129, 0.12);"><i class="fas fa-concierge-bell"></i></div>
      <div>
        <div class="stat-number"><?= esc($total_services) ?></div>
        <div class="stat-label">Services Offered</div>
      </div>
    </div>
  </div>
</div>

<!-- Recent Messages Table -->
<div class="admin-table-wrapper">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h5 class="fw-bold mb-0 text-white"><i class="fas fa-inbox text-primary me-2"></i>Recent Contact Submissions</h5>
    <a href="<?= base_url('admin/messages') ?>" class="btn btn-sm btn-outline-primary">View All Messages</a>
  </div>

  <div class="table-responsive">
    <table class="table table-dark-custom align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Sender Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($recent_messages)): ?>
          <?php foreach ($recent_messages as $msg): ?>
            <tr>
              <td>#<?= esc($msg['id']) ?></td>
              <td class="fw-semibold text-white"><?= esc($msg['name']) ?></td>
              <td><?= esc($msg['email']) ?></td>
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
                <a href="<?= base_url('admin/messages/view/' . $msg['id']) ?>" class="btn btn-sm btn-info me-1"><i class="fas fa-eye"></i> View</a>
                <a href="<?= base_url('admin/messages/delete/' . $msg['id']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center text-muted py-4">No contact messages received yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
