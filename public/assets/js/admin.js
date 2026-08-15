/* Admin Dashboard JavaScript */

$(document).ready(function () {
  // Confirm Delete
  $('.btn-delete').on('click', function (e) {
    if (!confirm('Are you sure you want to delete this record? This action cannot be undone.')) {
      e.preventDefault();
    }
  });

  // Image Upload Preview
  $('.image-preview-input').on('change', function () {
    const file = this.files[0];
    const previewContainer = $(this).siblings('.image-preview-target');
    if (file && previewContainer.length) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewContainer.attr('src', e.target.result).show();
      };
      reader.readAsDataURL(file);
    }
  });
});
