<?= $this->extend('layouts/admin') ?>

<?= $this->section('admin_content') ?>

<div class="admin-table-wrapper max-w-800">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="fw-bold mb-0"><i class="fas fa-plus-circle text-primary me-2"></i>Add Education Record</h5>
    <a href="<?= base_url('admin/education') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
  </div>

  <form action="<?= base_url('admin/education/store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Degree / Certificate *</label>
        <input type="text" name="degree" class="form-control" placeholder="Bachelor of Technology (B.Tech)" value="<?= old('degree') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Field of Study *</label>
        <input type="text" name="field_of_study" class="form-control" placeholder="Computer Science Engineering" value="<?= old('field_of_study') ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Institution / University *</label>
        <input type="text" name="institution" class="form-control" placeholder="Technical University" value="<?= old('institution') ?>" required>
      </div>

      <div class="col-md-3">
        <label class="form-label">Passing Year *</label>
        <input type="text" name="passing_year" class="form-control" placeholder="2020 - 2023" value="<?= old('passing_year') ?>" required>
      </div>

      <div class="col-md-3">
        <label class="form-label">Grade / Score</label>
        <input type="text" name="grade_score" class="form-control" placeholder="First Class" value="<?= old('grade_score') ?>">
      </div>

      <div class="col-12">
        <label class="form-label">Description / Coursework</label>
        <textarea name="description" class="form-control" rows="3"><?= old('description') ?></textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="1">
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Save Record</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
