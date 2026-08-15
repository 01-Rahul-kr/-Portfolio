<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Satyam Raj Portfolio</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Admin CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="login-page">

  <div class="login-card">
    <div class="text-center mb-4">
      <div class="mb-3">
        <i class="fas fa-user-shield text-primary display-4"></i>
      </div>
      <h3 class="fw-bold text-white mb-1">Admin Portal</h3>
      <p class="text-muted small">Sign in to manage portfolio content & settings</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger p-2 small mb-3 text-center">
        <i class="fas fa-exclamation-circle me-1"></i> <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success p-2 small mb-3 text-center">
        <i class="fas fa-check-circle me-1"></i> <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/login') ?>" method="POST">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label class="form-label text-muted small fw-semibold">Username or Email</label>
        <div class="input-group">
          <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-user"></i></span>
          <input type="text" name="username" class="form-control bg-dark border-secondary text-white" placeholder="admin" value="admin" required>
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label text-muted small fw-semibold">Password</label>
        <div class="input-group">
          <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-lock"></i></span>
          <input type="password" name="password" class="form-control bg-dark border-secondary text-white" placeholder="••••••••" value="admin123" required>
        </div>
        <div class="form-text text-muted small mt-1">Default credentials: Username: <code>admin</code> | Password: <code>admin123</code></div>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold" style="background: #6C63FF; border: none;">
        <i class="fas fa-sign-in-alt me-2"></i> Log In
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="<?= base_url() ?>" class="text-muted small text-decoration-none">
        <i class="fas fa-arrow-left me-1"></i> Back to Public Website
      </a>
    </div>
  </div>

</body>
</html>
