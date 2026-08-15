/* Satyam Raj Portfolio Main JavaScript */

$(document).ready(function () {
  // 1. Dark / Light Mode Toggle
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

  // 2. Typed.js Initialization
  if ($('.typed-text').length > 0 && typeof Typed !== 'undefined') {
    new Typed('.typed-text', {
      strings: [
        'PHP Developer',
        'Software Engineer',
        'CodeIgniter Developer',
        'Web Application Developer'
      ],
      typeSpeed: 60,
      backSpeed: 40,
      backDelay: 2000,
      loop: true
    });
  }

  // 3. Scroll Progress Bar & Back to Top Button
  $(window).on('scroll', function () {
    const scrollTop = $(window).scrollTop();
    const docHeight = $(document).height() - $(window).height();
    const scrollPercent = (scrollTop / docHeight) * 100;
    $('.scroll-progress-bar').css('width', scrollPercent + '%');

    if (scrollTop > 300) {
      $('.navbar-custom').addClass('scrolled');
      $('.back-to-top').addClass('active');
    } else {
      $('.navbar-custom').removeClass('scrolled');
      $('.back-to-top').removeClass('active');
    }
  });

  $('.back-to-top').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 500);
  });

  // 4. Portfolio Projects Filter
  $('.filter-btn').on('click', function () {
    $('.filter-btn').removeClass('active');
    $(this).addClass('active');

    const filterValue = $(this).attr('data-filter');

    if (filterValue === 'all') {
      $('.project-item').fadeIn(400);
    } else {
      $('.project-item').each(function () {
        if ($(this).attr('data-category').toLowerCase() === filterValue.toLowerCase()) {
          $(this).fadeIn(400);
        } else {
          $(this).fadeOut(200);
        }
      });
    }
  });

  // 5. Contact Form AJAX Submission
  $('#contactForm').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const submitBtn = form.find('button[type="submit"]');
    const alertBox = $('#contact-alert');

    submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Sending...');
    alertBox.hide().removeClass('alert-success alert-danger');

    $.ajax({
      url: form.attr('action'),
      type: 'POST',
      data: form.serialize(),
      dataType: 'json',
      success: function (response) {
        submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i>Send Message');

        if (response.status === 'success') {
          alertBox.addClass('alert alert-success').html('<i class="fas fa-check-circle me-2"></i>' + response.message).slideDown();
          form[0].reset();
        } else {
          let errorMsg = response.message || 'Validation error. Please check your inputs.';
          if (response.errors) {
            errorMsg = Object.values(response.errors).join('<br>');
          }
          alertBox.addClass('alert alert-danger').html('<i class="fas fa-exclamation-triangle me-2"></i>' + errorMsg).slideDown();
        }
      },
      error: function () {
        submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i>Send Message');
        alertBox.addClass('alert alert-danger').html('<i class="fas fa-exclamation-triangle me-2"></i>An error occurred. Please try again.').slideDown();
      }
    });
  });

  // 6. AOS Animation Init
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
});
