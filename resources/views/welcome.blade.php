@extends('layouts.app')
@extends('forms.contact')


<!DOCTYPE html>
<html lang="en">

<style>
  .testimonials {
  padding: 80px 0;
  background: url("https://img.freepik.com/photos-gratuite/roles-commerciaux-nature-morte-diverses-pieces-mecanisme_23-2149352652.jpg?w=740&t=st=1686480478~exp=1686481078~hmac=7993c636a0d9ced946a7a17277048401f3ca727c16207d81d7dcd83458910a96") no-repeat;
    background-position-x: 0%;
    background-position-y: 0%;
    background-attachment: scroll;
    background-size: auto;
  background-position: center center;
  background-size: cover;
  position: relative;
  }
</style>

<head>



  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Productive</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/icon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#"><span>Productive</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#features">caractéristiques</a></li>
          <li><a class="nav-link scrollto" href="#about">Apropos</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a href="/login" class="button primary">Connexion</a></li>
          <li><a href="/register" class="button primary">Inscription</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1><span>Productive</span>  votre chemin vers la productivité</h1>
            <h2>notre priorité est votre satisfaction</h2>
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto">Commencer</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="{{ asset('assets/img/Component 1 .png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Caractéristiques</h2>
          <p>Les fonctionnalités</p>
        </div>

        <div class="row" data-aos="fade-left">

          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="">Suivi les tâches</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a href="">Calendrier</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <i class="ri-message-line" style="color: #e361ff;"></i>
              <h3><a href="">Envoyer message</a></h3>
            </div>   

          </div>
          <div class="col-lg-3 col-md-4 mt-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
              <i class="ri-chat-1-line" style="color: #47aeff;"></i>
              <h3><a href="">Envoyer un commentaire</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <i class="ri-team-line" style="color: #ffa76e;"></i>
              <h3><a href="">Collaborer sur des projets</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
              <i class="ri-printer-line" style="color: #11dbcf;"></i>
              <h3><a href="">Imprimer tâche</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
              <i class="ri-send-plane-line" style="color: #4233ff;"></i>
              <h3><a href="">Envoyer notification</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
              <i class="ri-printer-line" style="color: #6cb8a7;"></i>
              <h3><a href="">Imprimer projet</a></h3>
            </div>
          </div>

          {{-- <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a href="">Réunions virtuelles</a></h3>
            </div>
          </div> --}}

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Details Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="{{ asset('assets/img/collab.png')}}" class="img-fluid" alt="">
      
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
                <div class="col-xl-12 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Productive est un outil de gestion des tâches et de collaboration en ligne</h3>

           
          </div>
            <p class="fst-italic">
              L'application offre une variété de fonctionnalités visant à améliorer la communication au sein des équipes 
              travaillant sur un projet. Elle facilite les échanges grâce à des réunions virtuelles et des conversations 
              par messages, favorisant ainsi une collaboration fluide et instantanée. De plus, cette application simplifie 
              grandement la gestion et le suivi des tâches. Les membres de l'équipe peuvent attribuer des responsabilités, 
              définir des échéances et suivre en temps réel l'avancement des différentes étapes du projet. Ces fonctionnalités
               sont généralement proposées par les outils de gestion des tâches et de collaboration en ligne pour optimiser la 
               productivité, la coordination et la communication au sein des équipes de travail.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Création de tâches.</li>
              <li><i class="bi bi-check"></i> Notifications et rappels.</li>
              <li><i class="bi bi-check"></i> Commentaires et discussions.</li>
              <li><i class="bi bi-check"></i> Calendrier et planification .</li>
            </ul>
  
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="{{ asset('assets/img/collab2.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Maximiser l'efficacité et la collaboration des équipes grâce à une plateforme tout-en-un</h3>
            
            <p>
              Dans un environnement de travail moderne, les équipes collaborent de manière étroite et efficace grâce 
              aux outils de gestion des tâches et de collaboration en ligne. Ces plateformes offrent une multitude de 
              fonctionnalités qui favorisent une collaboration transparente et productive. Les membres de l'équipe peuvent
               partager des idées, des documents et des fichiers en temps réel, ce qui permet un échange d'informations 
               fluide et instantané.
            </p>
            <p>
              Grâce aux discussions intégrées, ils peuvent poser des questions, donner des 
              commentaires et résoudre des problèmes en temps réel, sans avoir à attendre des réunions physiques. 
              Les tâches sont assignées de manière claire, avec des échéances définies, permettant ainsi à chaque membre 
              de savoir exactement ce qui est attendu de sa part            
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="{{ asset('assets/img/jpg.jpeg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Boostez votre productivité avec Productive : La plateforme ultime de gestion des tâches et de 
              collaboration en ligne</h3>
            <p>Productive est une plateforme tout-en-un conçue pour aider les équipes à atteindre un niveau de 
              productivité et de collaboration optimal. </p>
            
            <p>
              Grâce à une interface conviviale les équipes peuvent collaborer de manière transparente, que ce soit en 
              travaillant ensemble dans un même lieu ou à distance.
            </p>
            <p>
              Productive est le choix idéal pour les équipes souhaitant maximiser leur productivité et leur 
              collaboration, en offrant une solution complète qui simplifie et améliore leur flux de travail.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Details Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('assets/img/woman.png')}}" class="testimonial-img" alt="">
                <h3>Aguerchi Saida</h3>
                <h4>Développeur De L'application</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  La gestion efficace des tâches et la collaboration harmonieuse sont les piliers qui soutiennent 
                  le succès des équipes.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('assets/img/woman.png')}}" class="testimonial-img" alt="">
                <h3>Ousalah Imane</h3>
                <h4>Développeur De L'application</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Un travail bien organisé et une collaboration fluide mènent à des réalisations exceptionnelles.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Questions fréquemment posées</p>
        </div>

        <div class="faq-list">
          <ul>
            
          <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Pourquoi je dois choisir productive et pas autre ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  comprend l'importance d'un bon support client et s'engage à fournir une assistance de qualité à ses utilisateurs. L'équipe de support de Productive est disponible pour répondre à vos questions, résoudre les problèmes techniques et vous guider dans l'utilisation de l'outil. Vous pouvez compter sur leur expertise et leur réactivité pour vous aider à tirer le meilleur parti de Productive.
                </p>
              </div>
            </li>

            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Comment je peut utiliser productive? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Pour utiliser Productive, commencez par créer un compte sur leur site web. Une fois inscrit, vous pouvez créer des projets, attribuer des tâches à des membres de l'équipe, définir des échéances et communiquer avec votre équipe. Utilisez les fonctionnalités de suivi de l'avancement pour suivre les progrès, ajoutez des commentaires et partagez des fichiers.                 </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">pourquoi vous choisissez le nom productive? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  le nom "Productive" a probablement été choisi pour transmettre l'idée centrale de l'outil, qui est d'améliorer la productivité des utilisateurs.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Contacter nous</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>la fac sidi bouzid, SAFI, 46000</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Productive@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Appel:</h4>
                <p>+212 658 955 488 </p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message est envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
        <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Productive</h3>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
    
          <div class="col-lg-5 col-md-9 footer-newsletter">
            <h4>Notre newsletter</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Productive</span></strong>. Tous les droits sont réservés
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>

