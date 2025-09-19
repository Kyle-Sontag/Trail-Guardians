<?php
session_start();
require_once 'validate_contact.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KSontag Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body id="top">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main-nav">
      <div class="container">
        <a class="navbar-brand" href="#top">
          <img src="images/Portfolio.svg" alt="KS Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#projects">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section id="intro" class="bg-dark text-light min-vh-100 d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <div>
          <h1 class="display-2 fw-bold mb-3">Kyle Sontag</h1>
          <p class="accent-text fs-4 mb-4">Full Stack Web Developer</p>
        </div>
        <div class="bg-white p-3 shadow-lg">
          <img src="images/placeholder.png" alt="Picture of me"
              class="img-fluid profile-photo mb-3">
        </div>
      </div>
    </section>

    <section id="about" class="bg-dark text-light py-5 border-top">
      <div class="container">
        <!--Header-->
        <div class="text-center mb-5">
          <h2 class="display-4 fw-bold mb-2">About Me</h2>
        </div>
        <!--Main Content-->
        <div class="row mb-5">
          <div class="col-lg-8">
            <div id="background" class="mb-4">
              <p class="aboutHeader text-primary fw-bold mb-2">Background</p>
              <p>Hi, I'm Kyle! I am currently a student at Red River College in their
                Full Stack Web Development program and I am set to graduate in May 2026. I have previous work
                experience in sales and various other customer service jobs, but I found myself drawn
                towards coding and digital creation.</p>
            </div>
            <div id="objective" class="mb-4">
              <p class="aboutHeader text-primary fw-bold mb-2">Objective</p>
              <p>Currently I am looking for a co-op placement to finish my last term which will start
                at the beginning of January 2026 and go until May 2026. Ideally, I hope to find a co-op
                where I can contribute my skills while continuing to learn from more experienced developers,
                potentially transitioning into long-term employment.</p>
            </div>
            <div id="personal" class="mb-4">
              <p class="aboutHeader text-primary fw-bold mb-2">Personal</p>
              <p>Outside of school and work, I am a big gamer, I also love getting outside of the city to
                go for hikes (especially in the mountains when possible), and love spending time with my cats,
                dogs, or snake.</p>
            </div>
          </div>
        </div>
        <!--Skills-->
        <div id="coding" class="mb-4">
          <p class="aboutHeader text-primary fw-bold mb-2">Coding</p>
          <div class="skills-grid">
            <div class="skill-item">
              <span>HTML5</span>
              <img src="images/HTML5.png" alt="HTML5 icon">
            </div>
            <div class="skill-item">
              <span>CSS3</span>
              <img src="images/CSS3.png" alt="CSS3 icon">
            </div>
            <div class="skill-item">
              <span>JavaScript</span>
              <img src="images/Javascript.png" alt="JavaScript icon">
            </div>
            <div class="skill-item">
              <span>PHP</span>
              <img src="images/php.png" alt="PHP icon">
            </div>
            <div class="skill-item">
              <span>Ruby on Rails</span>
              <img src="images/rubyonrails.png" alt="Ruby on Rails icon">
            </div>
            <div class="skill-item">
              <span>Java</span>
              <img src="images/java.png" alt="Java Icon">
            </div>
            <div class="skill-item">
              <span>Python</span>
              <img src="images/Python.png" alt="Python Icon">
            </div>
            <div class="skill-item">
              <span>PostgreSQL</span>
              <img src="images/postgresql.png" alt="PostgreSQL icon">
            </div>
            <div class="skill-item">
              <span>MySQL</span>
              <img src="images/mysql.png" alt="MySQL icon">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="projects" class="bg-dark text-light py-5 border-top">
      <div class="container">
        <!--Header-->
        <div class="text-center mb-5">
          <h2 class="display-4 fw-bold mb-2">My Projects</h2>
        </div>
        <!--Projects-->
        <div class="row g-4">
          <!--Project1-->
          <div class="col-lg-6">
            <div class="project-card">
              <div class="project-image">
                <img src="images/placeholder.png" alt="Preview of my first website">
              </div>
              <div class="project-content">
                <h3 class="project-title">My First Website</h3>
                <p>This is the first website I launched utilizing the skills I learned in my first term
                  (don't judge it too hard)!</p>
                <div class="project-actions">
                  <a href="#" class="btn-action source-code">
                    <i class="fab fa-github"></i> Source Code
                  </a>
                  <a href="#" class="btn-action live-demo">
                    <i class="fas fa-external-link-alt"></i> Live Demo
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--Project2-->
          <div class="col-lg-6">
            <div class="project-card">
              <div class="project-image">
                <img src="images/placeholder.png" alt="Preview of my Pokémon team builder">
              </div>
              <div class="project-content">
                <h3 class="project-title">Pokémon Team Builder</h3>
                <p>This is a website I launched where people can create Pokémon teams and view teams other
                  people have created!</p>
                <div class="project-actions">
                  <a href="#" class="btn-action source-code">
                    <i class="fab fa-github"></i> Source Code
                  </a>
                  <a href="#" class="btn-action live-demo">
                    <i class="fas fa-external-link-alt"></i> Live Demo
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="bg-dark text-light py-5 py-4 border-top">
      <div class="container">
        <!--Header-->
        <div class="text-center mb-5">
          <h2 class="display-4 fw-bold mb-2">Contact Me</h2>
          <p class="lead">If you are interested in contacting me, feel free to fill out the form below!</p>
        </div>
        <!-- Success/Error Messages -->
        <?php if (isset($_GET['contact']) && $_GET['contact'] === 'success'): ?>
          <div class="alert alert-success text-center mb-4">
            <i class="fas fa-check-circle"></i> Message sent successfully! I'll get back to you soon.
          </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['contact_error'])): ?>
          <div class="alert alert-danger text-center mb-4">
            <i class="fas fa-exclamation-triangle"></i> <?php echo $_SESSION['contact_error']; ?>
          </div>
          <?php unset($_SESSION['contact_error']); ?>
        <?php endif; ?>
        <!--Contact Form-->
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <form id="contactForm" action="process_contact.php" method="post" class="needs-validation" novalidate>
              <!--CSRF Token-->
              <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

              <div class="mb-4">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control form-control-lg" id="name" name="name"
                       placeholder="John Doe" required maxlength="50">
                <div class="invalid-feedback">Please enter your name.</div>
              </div>

              <div class="mb-4">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email"
                       placeholder="jdoe123@example.com" required maxlength="100">
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>

              <div class="mb-4">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" class="form-control form-control-lg" id="subject" name="subject"
                       placeholder="Message Subject" required maxlength="100">
                <div class="invalid-feedback">Please provide a subject.</div>
              </div>

              <div class="mb-4">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your message"
                          required minlength="10" maxlength="2000"></textarea>
                <div class="invalid-feedback">Please enter a message (at least 10 characters).</div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-danger btn-lg px-5 me-3">
                  <i class="fas fa-paper-plane"></i> Send Message
                </button>
                <button type="reset" class="btn btn-outline-light btn-lg px-5">
                  <i class="fas fa-undo"></i> Clear Form
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-dark text-light py-4 border-top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md">
          <nav class="footer-nav">
            <a href="#top" class="footer-link me-3">Home</a>
            <a href="#about" class="footer-link me-3">About</a>
            <a href="#projects" class="footer-link me-3">Projects</a>
            <a href="#contact" class="footer-link">Contact</a>
          </nav>
        </div>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/portfolio.js"></script>
<!---->
</body>