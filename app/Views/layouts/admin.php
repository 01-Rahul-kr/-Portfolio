<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($page_title ?? 'Admin Dashboard') ?> | Portfolio Control Panel</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Cropper.js CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
  <!-- Admin CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="admin-body">

  <!-- Admin Sidebar -->
  <aside class="admin-sidebar">
    <div class="sidebar-header">
      <i class="fas fa-user-shield text-primary fs-4"></i>
      <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-brand">
        Rahul<span>Admin</span>
      </a>
    </div>

    <ul class="sidebar-menu">
      <li class="sidebar-item">
        <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'dashboard' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-th-large"></i> Dashboard</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/projects') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'projects' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-folder-open"></i> Projects</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/skills') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'skills' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-code"></i> Skills</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/experience') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'experience' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-briefcase"></i> Experience</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/education') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'education' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-graduation-cap"></i> Education</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/services') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'services' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-concierge-bell"></i> Services</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/resume') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'resume' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-file-pdf"></i> Resume</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/messages') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'messages' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-envelope"></i> Messages</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/social-links') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'social_links' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-share-alt"></i> Social Links</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/profile') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'profile' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-user-cog"></i> Profile</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/settings') ?>" class="sidebar-link <?= ($active_menu ?? '') === 'settings' ? 'active' : '' ?>">
          <span class="sidebar-link-left"><i class="fas fa-sliders-h"></i> Site Settings</span>
        </a>
      </li>

      <li class="sidebar-item mt-4">
        <a href="<?= base_url() ?>" target="_blank" class="sidebar-link text-info">
          <span class="sidebar-link-left"><i class="fas fa-external-link-alt"></i> View Live Site</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a href="<?= base_url('admin/logout') ?>" class="sidebar-link text-danger">
          <span class="sidebar-link-left"><i class="fas fa-sign-out-alt"></i> Logout</span>
        </a>
      </li>
    </ul>
  </aside>

  <!-- Admin Main Content -->
  <main class="admin-main">
    <!-- Header -->
    <header class="admin-header">
      <h2 class="admin-title mb-0"><?= esc($page_title ?? 'Dashboard') ?></h2>

      <div class="d-flex align-items-center gap-3">
        <button id="theme-toggle" class="theme-toggle-btn" title="Toggle Dark/Light Mode">
          <i class="fas fa-moon"></i>
        </button>
        <a href="<?= base_url('admin/profile') ?>" class="admin-profile-btn">
          <img src="<?= base_url(session()->get('avatar') ?: 'assets/images/hero_rahul.jpg') ?>" alt="Admin Avatar" class="admin-avatar">
          <span class="d-none d-md-inline fw-semibold"><?= esc(session()->get('full_name') ?: 'Rahul Kumar') ?></span>
        </a>
      </div>
    </header>

    <!-- Flash Notifications -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <ul class="mb-0 ps-3">
          <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Main Content Section -->
    <?= $this->renderSection('admin_content') ?>
  </main>

  <!-- Image Crop Modal -->
  <div class="modal fade" id="imageCropModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-dark border-secondary text-white">
        <div class="modal-header border-secondary">
          <h5 class="modal-title fw-bold"><i class="fas fa-crop-alt text-primary me-2"></i>Crop & Resize Image</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center p-3">
          <div style="max-height: 480px; overflow: hidden; background: #070A11; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <img id="cropImageTarget" src="" alt="Source Preview" style="max-width: 100%; display: block;">
          </div>
        </div>
        <div class="modal-footer border-secondary justify-content-between">
          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-secondary" id="btnRotateLeft" title="Rotate Left"><i class="fas fa-undo"></i> Rotate</button>
            <button type="button" class="btn btn-outline-secondary" id="btnRotateRight" title="Rotate Right"><i class="fas fa-redo"></i></button>
            <button type="button" class="btn btn-outline-secondary" id="btnResetCrop" title="Reset Crop"><i class="fas fa-sync-alt"></i> Reset</button>
          </div>
          <div>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btn-sm px-4" id="btnApplyCrop"><i class="fas fa-check me-1"></i> Apply & Crop</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
  <script src="<?= base_url('assets/js/admin.js') ?>"></script>
</body>
</html>
