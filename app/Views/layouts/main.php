<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($settings['site_title'] ?? 'Satyam Raj | Senior PHP & CodeIgniter Developer Portfolio') ?></title>
  
  <!-- SEO & Meta Tags -->
  <meta name="description" content="<?= esc($settings['meta_description'] ?? 'Portfolio of Satyam Raj, a passionate Software Engineer and PHP Developer specializing in CodeIgniter 4, MySQL, REST APIs, Bootstrap 5, and modern web application development.') ?>">
  <meta name="keywords" content="<?= esc($settings['meta_keywords'] ?? 'Satyam Raj, PHP Developer, CodeIgniter 4 Developer, Web Application Developer, Software Engineer, Portfolio, CodeIgniter') ?>">
  <meta name="author" content="Satyam Raj">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="<?= esc($settings['site_title'] ?? 'Satyam Raj | PHP Developer Portfolio') ?>">
  <meta property="og:description" content="<?= esc($settings['meta_description'] ?? 'Explore portfolio and projects by Satyam Raj - Software Engineer & CodeIgniter Developer.') ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= base_url($settings['hero_image'] ?? 'assets/images/hero_satyam.jpg') ?>">
  <meta property="og:url" content="<?= base_url() ?>">

  <!-- Schema Markup (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Satyam Raj",
    "jobTitle": "PHP Developer",
    "worksFor": {
      "@type": "Organization",
      "name": "Suropriyo Enterprises Private Limited"
    },
    "alumniOf": [
      {
        "@type": "EducationalOrganization",
        "name": "Computer Science Engineering"
      },
      {
        "@type": "EducationalOrganization",
        "name": "Petrochemical Engineering"
      }
    ],
    "knowsAbout": ["PHP", "CodeIgniter 4", "MySQL", "JavaScript", "Bootstrap 5", "REST APIs", "Web Development"],
    "email": "mailto:<?= esc($settings['email'] ?? 'satyamraj.dev@example.com') ?>",
    "url": "<?= base_url() ?>"
  }
  </script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- AOS Animation CSS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

  <!-- Scroll Progress Bar -->
  <div class="scroll-progress-bar"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>">
        <i class="fas fa-code text-primary"></i> Satyam<span class="logo-highlight">Raj</span>
      </a>

      <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#portfolioNavbar">
        <i class="fas fa-bars fs-4"></i>
      </button>

      <div class="collapse navbar-collapse" id="portfolioNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
          <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
          <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
          <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#resume">Resume</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <li class="nav-item ms-lg-2">
            <button id="theme-toggle" class="theme-toggle-btn" title="Toggle Dark/Light Mode">
              <i class="fas fa-moon"></i>
            </button>
          </li>
          <li class="nav-item ms-lg-2">
            <a href="<?= base_url('admin/login') ?>" class="btn btn-sm btn-outline-custom" title="Admin Portal">
              <i class="fas fa-user-shield me-1"></i> Admin
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Dynamic Content View -->
  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-md-start mb-3 mb-md-0">
          <h5 class="mb-1 text-white"><i class="fas fa-code text-primary"></i> Satyam Raj</h5>
          <p class="small mb-0 text-muted">PHP Developer & CodeIgniter Specialist @ <?= esc($settings['current_company'] ?? 'Suropriyo Enterprises Private Limited') ?></p>
        </div>
        <div class="col-md-6 text-md-end">
          <div class="social-icons-bar justify-content-md-end justify-content-center mt-0">
            <?php if (!empty($social_links)): ?>
              <?php foreach ($social_links as $s): ?>
                <a href="<?= esc($s['url']) ?>" target="_blank" class="social-icon-btn" title="<?= esc($s['platform']) ?>">
                  <i class="<?= esc($s['icon']) ?>"></i>
                </a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <hr class="my-4" style="border-color: var(--card-border);">
      <div class="row">
        <div class="col-12 text-center text-muted small">
          &copy; <?= date('Y') ?> Satyam Raj. All rights reserved. Crafted with <i class="fas fa-heart text-danger"></i> using CodeIgniter 4.
        </div>
      </div>
    </div>
  </footer>

  <!-- Back To Top Button -->
  <a href="#" class="back-to-top" title="Back to Top">
    <i class="fas fa-arrow-up"></i>
  </a>

  <!-- jQuery & Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Typed.js -->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <!-- AOS Animation JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- Custom Main JS -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>
