<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="row g-4">
  <!-- Profile Information Form -->
  <div class="col-lg-7">
    <div class="admin-table-wrapper">
      <h5 class="fw-bold mb-4 text-white"><i class="fas fa-user-cog text-primary me-2"></i>Account Information</h5>

      <form action="<?= base_url('admin/profile/update') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label text-muted small">Full Name *</label>
            <input type="text" name="full_name" class="form-control bg-dark text-white border-secondary" value="<?= esc($user['full_name']) ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label text-muted small">Username *</label>
            <input type="text" name="username" class="form-control bg-dark text-white border-secondary" value="<?= esc($user['username']) ?>" required>
          </div>

          <div class="col-12">
            <label class="form-label text-muted small">Email Address *</label>
            <input type="email" name="email" class="form-control bg-dark text-white border-secondary" value="<?= esc($user['email']) ?>" required>
          </div>

          <div class="col-12">
            <label class="form-label text-muted small">Profile Avatar Image</label>
            <input type="file" name="avatar" class="form-control bg-dark text-white border-secondary image-preview-input" accept="image/*">
          </div>

          <div class="col-12 text-center mt-3">
            <img src="<?= base_url($user['avatar']) ?>" alt="Avatar Preview" class="admin-avatar image-preview-target" style="width: 90px; height: 90px; border: 2px solid var(--admin-primary);">
          </div>

          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Change Password Form -->
  <div class="col-lg-5">
    <div class="admin-table-wrapper">
      <h5 class="fw-bold mb-4 text-white"><i class="fas fa-key text-warning me-2"></i>Change Password</h5>

      <form action="<?= base_url('admin/profile/change-password') ?>" method="POST">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label class="form-label text-muted small">Current Password *</label>
          <input type="password" name="current_password" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-muted small">New Password *</label>
          <input type="password" name="new_password" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <div class="mb-4">
          <label class="form-label text-muted small">Confirm New Password *</label>
          <input type="password" name="confirm_password" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <button type="submit" class="btn btn-warning w-100 py-2 fw-semibold"><i class="fas fa-lock me-1"></i> Update Password</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
