<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <h5 class="fw-bold mb-4"><i class="fas fa-sliders-h text-primary me-2"></i>Website & Portfolio Settings</h5>

  <form action="<?= base_url('admin/settings/update') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <ul class="nav nav-tabs mb-4 border-secondary" id="settingsTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-white" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General & Owner</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab">SEO & Meta Tags</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab">Images & Map</button>
      </li>
    </ul>

    <div class="tab-content" id="settingsTabContent">
      <!-- General Tab -->
      <div class="tab-pane fade show active" id="general" role="tabpanel">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Owner Full Name *</label>
            <input type="text" name="owner_name" class="form-control" value="<?= esc($settings['owner_name']) ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Profession / Job Title *</label>
            <input type="text" name="profession" class="form-control" value="<?= esc($settings['profession']) ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Current Company *</label>
            <input type="text" name="current_company" class="form-control" value="<?= esc($settings['current_company']) ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Years of Experience *</label>
            <input type="number" name="years_experience" class="form-control" value="<?= esc($settings['years_experience']) ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Contact Email *</label>
            <input type="email" name="email" class="form-control" value="<?= esc($settings['email']) ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Contact Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= esc($settings['phone']) ?>">
          </div>

          <div class="col-12">
            <label class="form-label">Location Address</label>
            <input type="text" name="location" class="form-control" value="<?= esc($settings['location']) ?>">
          </div>

          <div class="col-12">
            <label class="form-label">Short Bio (Hero Section)</label>
            <textarea name="bio" class="form-control" rows="3"><?= esc($settings['bio']) ?></textarea>
          </div>

          <div class="col-12">
            <label class="form-label">Career Objective (About Section)</label>
            <textarea name="career_objective" class="form-control" rows="4"><?= esc($settings['career_objective']) ?></textarea>
          </div>
        </div>
      </div>

      <!-- SEO Tab -->
      <div class="tab-pane fade" id="seo" role="tabpanel">
        <div class="row g-3">
          <div class="col-12">
            <label class="form-label">Site Title Tag *</label>
            <input type="text" name="site_title" class="form-control" value="<?= esc($settings['site_title']) ?>" required>
          </div>

          <div class="col-12">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3"><?= esc($settings['meta_description']) ?></textarea>
          </div>

          <div class="col-12">
            <label class="form-label">Meta Keywords</label>
            <textarea name="meta_keywords" class="form-control" rows="3"><?= esc($settings['meta_keywords']) ?></textarea>
          </div>
        </div>
      </div>

      <!-- Media Tab -->
      <div class="tab-pane fade" id="media" role="tabpanel">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Hero Section Photo</label>
            <input type="file" name="hero_image" class="form-control image-preview-input" accept="image/*">
            <div class="mt-2">
              <img src="<?= base_url($settings['hero_image']) ?>" alt="Hero Preview" class="image-preview-target" style="max-width: 120px; border-radius: 12px; border: 1px solid var(--card-border);">
            </div>
          </div>

          <div class="col-md-6">
            <label class="form-label">About Section Photo</label>
            <input type="file" name="about_image" class="form-control image-preview-input" accept="image/*">
            <div class="mt-2">
              <img src="<?= base_url($settings['about_image']) ?>" alt="About Preview" class="image-preview-target" style="max-width: 120px; border-radius: 12px; border: 1px solid var(--card-border);">
            </div>
          </div>

          <div class="col-12 mt-3">
            <label class="form-label">Google Map Embed Code (iFrame HTML)</label>
            <textarea name="google_map_iframe" class="form-control" rows="4"><?= esc($settings['google_map_iframe']) ?></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 mt-4">
      <button type="submit" class="btn btn-primary px-4 py-2"><i class="fas fa-save me-1"></i> Save All Settings</button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
