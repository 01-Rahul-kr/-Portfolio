<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- ==========================================
     1. HOME / HERO SECTION
     ========================================== -->
<section id="home" class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
        <div class="hero-content">
          <h5><i class="fas fa-terminal me-2"></i>Hello & Welcome</h5>
          <h1 class="hero-title">
            Hi, I'm <span class="hero-name"><?= esc($settings['owner_name'] ?? 'Rahul Kumar') ?></span><br>
            <span class="typed-text"></span>
          </h1>
          <p class="hero-subtitle">
            <?= esc($settings['bio'] ?? 'Passionate Software Developer with experience in PHP development and modern web technologies. Specialized in CodeIgniter 4, MySQL, REST APIs & Bootstrap 5.') ?>
          </p>

          <div class="d-flex flex-wrap gap-3 align-items-center">
            <a href="<?= base_url('resume/download') ?>" class="btn btn-primary-custom">
              <i class="fas fa-download"></i> Download Resume
            </a>
            <a href="#contact" class="btn btn-outline-custom">
              <i class="fas fa-paper-plane"></i> Hire Me
            </a>
          </div>

          <div class="social-icons-bar mt-4">
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

      <div class="col-lg-5 text-center mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1000">
        <div class="hero-image-wrapper">
          <img src="<?= base_url($settings['hero_image'] ?? 'assets/images/hero_rahul.jpg') ?>" alt="Rahul Kumar - PHP Developer" class="hero-img">
          
          <div class="experience-badge">
            <div class="badge-number"><?= esc($settings['years_experience'] ?? 3) ?>+</div>
            <div class="badge-text">Years of<br>Experience</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================
     2. ABOUT SECTION
     ========================================== -->
<section id="about" class="py-5">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Get To Know Me</span>
      <h2 class="section-title">About Me</h2>
    </div>

    <div class="row align-items-center g-5">
      <div class="col-lg-5" data-aos="fade-right">
        <div class="position-relative">
          <img src="<?= base_url($settings['about_image'] ?? 'assets/images/about_rahul.jpg') ?>" alt="About Rahul Kumar" class="about-image shadow-lg">
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-left">
        <h3 class="mb-3 text-primary font-poppins">Software Developer & PHP Specialist</h3>
        <p class="text-muted mb-4 lead" style="font-size: 1.05rem;">
          <?= esc($settings['career_objective'] ?? 'Passionate Software Developer with experience in PHP development and modern web technologies. Skilled in developing scalable web applications using CodeIgniter, PHP, MySQL, JavaScript, Bootstrap, and REST APIs. Looking to build innovative digital solutions with clean architecture and excellent user experience.') ?>
        </p>

        <div class="row g-4 mb-4">
          <div class="col-sm-6">
            <div class="info-item">
              <div class="info-icon"><i class="fas fa-building"></i></div>
              <div>
                <span class="d-block text-muted small">Current Company</span>
                <strong><?= esc($settings['current_company'] ?? 'Suropriyo Enterprises Private Limited') ?></strong>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="info-item">
              <div class="info-icon"><i class="fas fa-briefcase"></i></div>
              <div>
                <span class="d-block text-muted small">Experience</span>
                <strong><?= esc($settings['years_experience'] ?? 3) ?>+ Years Professional</strong>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="info-item">
              <div class="info-icon"><i class="fas fa-graduation-cap"></i></div>
              <div>
                <span class="d-block text-muted small">Qualification</span>
                <strong>B.Tech in Computer Science</strong>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="info-item">
              <div class="info-icon"><i class="fas fa-envelope"></i></div>
              <div>
                <span class="d-block text-muted small">Email Address</span>
                <strong><?= esc($settings['email'] ?? 'rahulkumar.dev@example.com') ?></strong>
              </div>
            </div>
          </div>
        </div>

        <div class="custom-card p-4">
          <h5 class="mb-3"><i class="fas fa-award text-accent me-2"></i>Key Technical Strengths</h5>
          <div class="d-flex flex-wrap gap-2">
            <span class="strength-badge"><i class="fas fa-check text-success me-1"></i> Clean MVC Code</span>
            <span class="strength-badge"><i class="fas fa-check text-success me-1"></i> Scalable DB Schema</span>
            <span class="strength-badge"><i class="fas fa-check text-success me-1"></i> REST API Development</span>
            <span class="strength-badge"><i class="fas fa-check text-success me-1"></i> Performance Optimization</span>
            <span class="strength-badge"><i class="fas fa-check text-success me-1"></i> Bug Diagnosis & Fixing</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================
     3. SKILLS SECTION
     ========================================== -->
<section id="skills" class="py-5 section-alt">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Technical Proficiency</span>
      <h2 class="section-title">Skills & Capabilities</h2>
    </div>

    <div class="row g-4">
      <?php if (!empty($skills)): ?>
        <?php foreach ($skills as $index => $skill): ?>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= ($index % 3) * 100 ?>">
            <div class="skill-card">
              <div class="skill-info">
                <span class="skill-name">
                  <i class="<?= esc($skill['icon']) ?>"></i> <?= esc($skill['name']) ?>
                </span>
                <span class="skill-percentage"><?= esc($skill['percentage']) ?>%</span>
              </div>
              <div class="progress progress-custom">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: <?= esc($skill['percentage']) ?>%;" aria-valuenow="<?= esc($skill['percentage']) ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ==========================================
     4. EXPERIENCE SECTION
     ========================================== -->
<section id="experience" class="py-5">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Career Journey</span>
      <h2 class="section-title">Work Experience</h2>
    </div>

    <div class="timeline">
      <?php if (!empty($experiences)): ?>
        <?php foreach ($experiences as $exp): ?>
          <div class="timeline-item" data-aos="fade-up">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
              <span class="timeline-date"><i class="far fa-calendar-alt me-1"></i> <?= esc($exp['start_date']) ?> - <?= esc($exp['end_date']) ?></span>
              <h4 class="mb-1"><?= esc($exp['job_title']) ?></h4>
              <h6 class="text-primary mb-3"><i class="fas fa-building me-1"></i> <?= esc($exp['company']) ?> (<?= esc($exp['location']) ?>)</h6>
              <p class="text-muted small mb-2">Key Responsibilities & Highlights:</p>
              <ul class="text-muted ps-3 mb-0">
                <?php 
                  $resps = explode('|', $exp['responsibilities']);
                  foreach ($resps as $r):
                    if (trim($r)):
                ?>
                  <li class="mb-1"><?= esc(trim($r)) ?></li>
                <?php 
                    endif;
                  endforeach; 
                ?>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ==========================================
     5. EDUCATION SECTION
     ========================================== -->
<section id="education" class="py-5 section-alt">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Academic Qualifications</span>
      <h2 class="section-title">Education History</h2>
    </div>

    <div class="timeline">
      <?php if (!empty($educations)): ?>
        <?php foreach ($educations as $edu): ?>
          <div class="timeline-item" data-aos="fade-up">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
              <span class="timeline-date"><i class="fas fa-graduation-cap me-1"></i> <?= esc($edu['passing_year']) ?></span>
              <h4 class="mb-1"><?= esc($edu['degree']) ?></h4>
              <h6 class="text-accent mb-2"><?= esc($edu['field_of_study']) ?></h6>
              <p class="text-muted mb-2"><i class="fas fa-university me-1"></i> <?= esc($edu['institution']) ?></p>
              <?php if (!empty($edu['grade_score'])): ?>
                <span class="badge bg-primary text-white mb-2"><?= esc($edu['grade_score']) ?></span>
              <?php endif; ?>
              <p class="text-muted small mb-0"><?= esc($edu['description']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ==========================================
     6. PROJECTS SECTION
     ========================================== -->
<section id="projects" class="py-5">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Featured Portfolio Work</span>
      <h2 class="section-title">Featured Projects</h2>
    </div>

    <!-- Category Filter Tabs -->
    <div class="portfolio-filter" data-aos="fade-up">
      <button class="filter-btn active" data-filter="all">All Projects</button>
      <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $cat): ?>
          <button class="filter-btn" data-filter="<?= esc(strtolower($cat)) ?>"><?= esc($cat) ?></button>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <div class="row g-4">
      <?php if (!empty($projects)): ?>
        <?php foreach ($projects as $project): ?>
          <div class="col-md-6 col-lg-6 project-item" data-category="<?= esc($project['category']) ?>" data-aos="fade-up">
            <div class="project-card">
              <div class="project-img-wrapper">
                <img src="<?= base_url($project['image']) ?>" alt="<?= esc($project['title']) ?>" class="project-img">
                <div class="project-overlay">
                  <a href="<?= esc($project['github_link']) ?>" target="_blank" class="project-link-btn" title="View Source Code">
                    <i class="fab fa-github"></i>
                  </a>
                  <a href="<?= esc($project['demo_link']) ?>" target="_blank" class="project-link-btn" title="Live Preview">
                    <i class="fas fa-external-link-alt"></i>
                  </a>
                </div>
              </div>

              <div class="project-body">
                <div class="mb-2">
                  <span class="badge bg-primary text-uppercase" style="font-size: 0.75rem;"><?= esc($project['category']) ?></span>
                </div>
                <h4 class="mb-2"><?= esc($project['title']) ?></h4>
                <p class="text-muted small mb-3"><?= esc($project['description']) ?></p>

                <div>
                  <?php 
                    $techs = explode(',', $project['technologies']);
                    foreach ($techs as $t):
                      if (trim($t)):
                  ?>
                    <span class="tech-tag"><?= esc(trim($t)) ?></span>
                  <?php 
                      endif;
                    endforeach; 
                  ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ==========================================
     7. SERVICES SECTION
     ========================================== -->
<section id="services" class="py-5 section-alt">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">What I Offer</span>
      <h2 class="section-title">Specialized Services</h2>
    </div>

    <div class="row g-4">
      <?php if (!empty($services)): ?>
        <?php foreach ($services as $index => $service): ?>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= ($index % 3) * 100 ?>">
            <div class="service-card">
              <div class="service-icon">
                <i class="<?= esc($service['icon']) ?>"></i>
              </div>
              <h4 class="mb-3"><?= esc($service['title']) ?></h4>
              <p class="text-muted small mb-0"><?= esc($service['description']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ==========================================
     8. RESUME SECTION
     ========================================== -->
<section id="resume" class="py-5">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Professional Curriculum Vitae</span>
      <h2 class="section-title">Download Resume</h2>
    </div>

    <div class="row justify-content-center" data-aos="zoom-in">
      <div class="col-lg-8">
        <div class="custom-card text-center p-5 position-relative overflow-hidden">
          <div class="mb-4">
            <i class="fas fa-file-pdf text-danger display-1"></i>
          </div>
          <h3 class="mb-2"><?= esc($settings['owner_name'] ?? 'Rahul Kumar') ?> - Curriculum Vitae</h3>
          <p class="text-muted mb-4">
            Download my comprehensive resume for detailed information on work history, tech stack proficiency, projects, and educational credentials.
          </p>
          <div class="d-flex justify-content-center gap-3">
            <a href="<?= base_url('resume/download') ?>" class="btn btn-primary-custom btn-lg">
              <i class="fas fa-download me-2"></i> Download PDF (<?= esc($resume['file_size'] ?? '120 KB') ?>)
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================
     9. CONTACT SECTION
     ========================================== -->
<section id="contact" class="py-5 section-alt">
  <div class="container py-5">
    <div class="section-header" data-aos="fade-up">
      <span class="section-subtitle">Let's Connect</span>
      <h2 class="section-title">Contact Me</h2>
    </div>

    <div class="row g-5">
      <div class="col-lg-5" data-aos="fade-right">
        <h4 class="mb-4">Get In Touch</h4>

        <div class="contact-info-card">
          <div class="info-icon"><i class="fas fa-envelope"></i></div>
          <div>
            <span class="d-block text-muted small">Email Address</span>
            <strong><?= esc($settings['email'] ?? 'rahulkumar.dev@example.com') ?></strong>
          </div>
        </div>

        <div class="contact-info-card">
          <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
          <div>
            <span class="d-block text-muted small">Phone / Mobile</span>
            <strong><?= esc($settings['phone'] ?? '+91 98765 43210') ?></strong>
          </div>
        </div>

        <div class="contact-info-card">
          <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div>
            <span class="d-block text-muted small">Location</span>
            <strong><?= esc($settings['location'] ?? 'India') ?></strong>
          </div>
        </div>

        <!-- Google Map Embed Placeholder -->
        <div class="rounded-4 overflow-hidden mt-4 border" style="border-color: var(--card-border) !important;">
          <?php if (!empty($settings['google_map_iframe'])): ?>
            <?= $settings['google_map_iframe'] ?>
          <?php else: ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.123456789!2d88.3639!3d22.5726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277a1a2b3c4d5%3A0x123456789abcdef!2sKolkata!5e0!3m2!1sen!2sin!4v1600000000000!5m2!1sen!2sin" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-left">
        <div class="custom-card p-4 p-md-5">
          <h4 class="mb-4"><i class="fas fa-paper-plane text-primary me-2"></i>Send A Message</h4>

          <div id="contact-alert" class="alert p-3 mb-4" role="alert"></div>

          <form id="contactForm" action="<?= base_url('contact/send') ?>" method="POST" class="contact-form">
            <?= csrf_field() ?>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label text-muted small">Your Name *</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe" required>
              </div>

              <div class="col-md-6">
                <label class="form-label text-muted small">Your Email *</label>
                <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
              </div>

              <div class="col-md-6">
                <label class="form-label text-muted small">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
              </div>

              <div class="col-md-6">
                <label class="form-label text-muted small">Subject *</label>
                <input type="text" name="subject" class="form-control" placeholder="Project Discussion" required>
              </div>

              <div class="col-12">
                <label class="form-label text-muted small">Message *</label>
                <textarea name="message" class="form-control" rows="5" placeholder="Write your project details or inquiry here..." required></textarea>
              </div>

              <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary-custom w-100 py-3">
                  <i class="fas fa-paper-plane me-2"></i>Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
