/* Admin Dashboard JavaScript - Image Cropper & Preview Handler */

$(document).ready(function () {
  // 0. Dark / Light Mode Theme Sync
  const themeToggleBtn = $('#theme-toggle');
  const currentTheme = localStorage.getItem('theme') || 'dark';
  $('html').attr('data-theme', currentTheme);

  if (currentTheme === 'light') {
    themeToggleBtn.find('i').removeClass('fa-moon').addClass('fa-sun');
  }

  themeToggleBtn.on('click', function () {
    let theme = $('html').attr('data-theme');
    if (theme === 'dark') {
      $('html').attr('data-theme', 'light');
      localStorage.setItem('theme', 'light');
      $(this).find('i').removeClass('fa-moon').addClass('fa-sun');
    } else {
      $('html').attr('data-theme', 'dark');
      localStorage.setItem('theme', 'dark');
      $(this).find('i').removeClass('fa-sun').addClass('fa-moon');
    }
  });
  // 1. Confirm Delete
  $('.btn-delete').on('click', function (e) {
    if (!confirm('Are you sure you want to delete this record? This action cannot be undone.')) {
      e.preventDefault();
    }
  });

  // 2. Interactive Image Cropper & Preview Handler
  let cropper = null;
  let currentInput = null;
  let currentPreview = null;
  const cropModalEl = document.getElementById('imageCropModal');
  const cropModal = cropModalEl ? new bootstrap.Modal(cropModalEl) : null;
  const cropImageTarget = document.getElementById('cropImageTarget');

  $('.image-preview-input').on('change', function (e) {
    const file = e.target.files[0];
    if (!file || !file.type.startsWith('image/')) return;

    currentInput = this;
    currentPreview = $(this).siblings('.image-preview-target');
    if (!currentPreview.length) {
      currentPreview = $(this).closest('.col-md-6, .col-12, form').find('.image-preview-target');
    }

    const reader = new FileReader();
    reader.onload = function (event) {
      cropImageTarget.src = event.target.result;
      if (cropModal) {
        cropModal.show();
      }
    };
    reader.readAsDataURL(file);
  });

  if (cropModalEl) {
    cropModalEl.addEventListener('shown.bs.modal', function () {
      if (cropper) {
        cropper.destroy();
      }

      // Determine aspect ratio based on field name
      const fieldName = currentInput ? currentInput.name : '';
      let aspectRatio = NaN; // Free crop by default

      if (fieldName === 'avatar' || fieldName === 'hero_image' || fieldName === 'about_image') {
        aspectRatio = 1; // 1:1 Square
      } else if (fieldName === 'image') {
        aspectRatio = 1.6; // 16:10 Project Banner
      }

      cropper = new Cropper(cropImageTarget, {
        aspectRatio: aspectRatio,
        viewMode: 1,
        autoCropArea: 0.9,
        responsive: true,
        background: false,
      });
    });

    cropModalEl.addEventListener('hidden.bs.modal', function () {
      if (cropper) {
        cropper.destroy();
        cropper = null;
      }
    });

    $('#btnRotateLeft').on('click', function () {
      if (cropper) cropper.rotate(-90);
    });

    $('#btnRotateRight').on('click', function () {
      if (cropper) cropper.rotate(90);
    });

    $('#btnResetCrop').on('click', function () {
      if (cropper) cropper.reset();
    });

    $('#btnApplyCrop').on('click', function () {
      if (!cropper || !currentInput) return;

      const fieldName = currentInput.name;
      let targetW = 800;
      let targetH = 800;

      if (fieldName === 'avatar') {
        targetW = 300;
        targetH = 300;
      } else if (fieldName === 'image') {
        targetW = 800;
        targetH = 500;
      }

      const canvas = cropper.getCroppedCanvas({
        width: targetW,
        height: targetH,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
      });

      canvas.toBlob(function (blob) {
        if (!blob) return;

        // Create new File from cropped blob
        const fileName = (currentInput.files[0] ? currentInput.files[0].name : 'cropped.jpg');
        const croppedFile = new File([blob], fileName, { type: 'image/jpeg' });

        // Update file input using DataTransfer
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(croppedFile);
        currentInput.files = dataTransfer.files;

        // Update live preview image tag
        if (currentPreview && currentPreview.length) {
          currentPreview.attr('src', URL.createObjectURL(blob)).show();
        }

        cropModal.hide();
      }, 'image/jpeg', 0.92);
    });
  }
});
