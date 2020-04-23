<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?= PATH_ASSETS ?>front/favicon.png">
  <link rel="apple-touch-icon" href="<?= PATH_ASSETS ?>front/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= PATH_ASSETS ?>front/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= PATH_ASSETS ?>front/apple-touch-icon-114x114.png">

  <title><?= $tipage ?></title>

  <!-- Styles -->
  <link href="<?= PATH_ASSETS ?>front/css/style.css" rel="stylesheet" media="screen">
</head>

<body class="body-full-page">

  <div class="loader">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div>

  <!-- Content CLick Capture-->

  <div class="click-capture"></div>

  <!-- Sidebar Menu-->

  <div class="menu">
    <span class="close-menu icon-cross2 right-boxed"></span>
    <div class="menu-lang right-boxed">
      <!--<a href="" class="active">Eng</a>-->
      <!--<a href="">Fra</a>-->
      <!--<a href="">Ger</a>-->
    </div>
    <ul class="menu-list right-boxed">
      <li data-menuanchor="page1">
        <a href="#page1">Home</a>
      </li>
      <li data-menuanchor="page2">
        <a href="#page2">Specialization</a>
      </li>
      <li data-menuanchor="page3">
        <a href="#page3">Projects</a>
      </li>
      <li data-menuanchor="page4">
        <a href="#page4">Services</a>
      </li>
      <li data-menuanchor="page6">
        <a href="#page6">Reviews</a>
      </li>
      <li data-menuanchor="page7">
        <a href="#page7">Contact</a>
      </li>
      <li data-menuanchor="admin">
        <?php if ($this->session->userdata('user') == null) : ?>
          <a href="<?= base_url('admin') ?>">Login</a>
        <?php else : ?>
          <a href="<?= base_url('admin') ?>">Halo <?= $this->session->userdata('user'); ?>
          </a>
        <?php endif; ?>

      </li>
    </ul>
    <div class="menu-footer right-boxed">
      <div class="social-list">
        <a href="" class="icon ion-social-twitter"></a>
        <a href="" class="icon ion-social-facebook"></a>
        <a href="" class="icon ion-social-googleplus"></a>
        <a href="" class="icon ion-social-linkedin"></a>
        <a href="" class="icon ion-social-dribbble-outline"></a>
      </div>
      <div class="copy">
        © reactmore <?= date('Y') ?>. All Rights Reseverd<br> Design by More
      </div>
    </div>
  </div>

  <!-- Navbar -->

  <header class="navbar navbar-2 navbar-white boxed">
    <div class="navbar-bg"></div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <a class="brand" href="#">
      <img class="brand-img" alt="" src="<?= PATH_ASSETS ?>front/images/brand.png">
      <div class="brand-info">
        <div class="brand-name">
          Reactmore
        </div>
        <div class="brand-text">
          Web Profile
        </div>
      </div>
    </a>

    <div class="social-list hidden-xs">
      <a href="" class="icon ion-social-twitter"></a>
      <a href="" class="icon ion-social-facebook"></a>
      <a href="" class="icon ion-social-googleplus"></a>
      <a href="" class="icon ion-social-linkedin"></a>
      <a href="" class="icon ion-social-dribbble-outline"></a>
    </div>
  </header>
  <div class="copy-bottom white boxed">
    © Andry Setyoso <?= date('Y') ?>.
  </div>
  <div class="lang-bottom white boxed">
    <div class="menu-lang">
      <a href="" class="icon ion-social-github"> Github Repo</a>
    </div>
  </div>
  <div class="pagepiling">
    <div data-anchor="page1" class="pp-scrollable text-white section section-1">
      <div class="scroll-wrap">
        <div class="section-bg" style="background-image:url(assets/front/images/bg/bg1.jpg);"></div>
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title hidden-xs hidden-sm">
                <span>Introduce</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-8 col-lg-6">
                        <p class="subtitle-top">
                          Welcome To<br>Web Profile Studio
                        </p>
                        <h1 class="display-2 text-white"><span class="text-primary">Hello</span> my name is Andry.</h1>
                        <div class="hr-bottom"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page2" class="pp-scrollable section section-2">
      <div class="scroll-wrap">
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title text-dark hidden-xs hidden-sm">
                <span>what I do</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-5 col-lg-5">
                        <p class="subtitle-top text-dark">
                          About me
                        </p>
                        <h2 class="title-uppercase">My mission is<br> <span class="text-primary">design &amp; develop</span> the best Websites around</h2>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit pariatur odio unde deleniti eveniet magni cum, ad iure, vel nisi minima vero voluptates ut ipsum amet iusto hic.
                      </div>
                      <div class="col-md-6 col-lg-5 col-md-offset-1 col-lg-offset-2">
                        <div class="progress-bars">
                          <div class="clearfix">
                            <div class="number pull-left">
                              Development
                            </div>
                            <div class="number pull-right">
                              80%
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="clearfix">
                            <div class="number pull-left">
                              WordPress
                            </div>
                            <div class="number pull-right">
                              70%
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="clearfix">
                            <div class="number pull-left">
                              Design
                            </div>
                            <div class="number pull-right">
                              80%
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="clearfix">
                            <div class="number pull-left">
                              Marketing
                            </div>
                            <div class="number pull-right">
                              60%
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page3" class="pp-scrollable text-white section section-3">
      <div class="scroll-wrap">
        <div class="bg-changer">
          <div class="section-bg" style="background-image:url(assets/front/images/bg/bg2.jpg);"></div>
          <div class="section-bg" style="background-image:url(assets/front/images/bg/bg2-2.jpg);"></div>
          <div class="section-bg" style="background-image:url(assets/front/images/bg/bg2-3.jpg);"></div>
          <div class="section-bg" style="background-image:url(assets/front/images/bg/bg2-4.jpg);"></div>
          <div class="section-bg" style="background-image:url(assets/front/images/bg/bg2-5.jpg);"></div>
          <div class="section-bg" style="background-image:url(assets/front/images/bg/bg2-6.jpg);"></div>
        </div>
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title hidden-xs hidden-sm">
                <span>my works</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-12">
                        <h2 class="title-uppercase text-white">Featured works</h2>
                        <div class="row-project-box row">
                          <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                            <a href="" class="project-box">
                              <div class="project-box-inner">
                                <h5>UCAM Minimalist Apartment</h5>
                                <div class="project-category">
                                  House Design
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                            <a href="" class="project-box">
                              <div class="project-box-inner">
                                <h5>Scadinavan Living Room</h5>
                                <div class="project-category">
                                  House Design
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                            <a href="" class="project-box">
                              <div class="project-box-inner">
                                <h5>Office For Fashion Brand Store</h5>
                                <div class="project-category">
                                  Commercial Design
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                            <a href="" class="project-box">
                              <div class="project-box-inner">
                                <h5>Rennovate Toilet</h5>
                                <div class="project-category">
                                  House Design
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                            <a href="" class="project-box">
                              <div class="project-box-inner">
                                <h5>Rennovate Toilet</h5>
                                <div class="project-category">
                                  House Design
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                            <a href="" class="project-box">
                              <div class="project-box-inner">
                                <h5>Rennovate Toilet</h5>
                                <div class="project-category">
                                  House Design
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="h5 link-arrow text-white">view all projects <i class="icon icon-chevron-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page4" class="pp-scrollable section section-4">
      <div class="scroll-wrap">
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title text-dark hidden-xs hidden-sm">
                <span>Services</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-5 col-lg-5">
                        <p class="subtitle-top text-dark">
                          My services
                        </p>
                        <h2 class="title-uppercase">I like <span class="text-primary">to make</span> things easy and fun</h2>
                        <ul class="service-list">
                          <li><a href="">01. Development</a></li>
                          <li><a href="">02. WordPress</a></li>
                          <li><a href="">03. Design</a></li>
                          <li><a href="">04. Marketing</a></li>
                          <li><a href="">05. Design</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-5 col-md-offset-1 col-lg-offset-2">
                        <div class="dots-image-2">
                          <img alt="" class="img-responsive" src="<?= PATH_ASSETS ?>front/images/1-470x490.jpg">
                          <div class="dots"></div>
                          <div class="experience-info">
                            <div class="number">
                              4
                            </div>
                            <div class="text">
                              Years<br>Experience<br>Working
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page5" class="pp-scrollable text-white section section-6">
      <div class="scroll-wrap">
        <div class="section-bg" style="background-image:url(assets/front/images/bg/bg3.jpg);"></div>
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title hidden-xs hidden-sm">
                <span>Resume</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="col-resume">
                          <h6 class="resume-title">
                            Education
                          </h6>
                          <div class="resume-content">
                            <div class="resume-inner">
                              <div class="resume-row">
                                <h6 class="resume-type">SPECIALIZATION COURSE</h6>
                                <p class="resume-study">
                                  University of studies, Poland, Cracow
                                </p>
                                <p class="resume-date text-primary">
                                  Jan 2004 - Dec 2006
                                </p>
                                <p class="resume-text">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus nobis animi assumenda sint recusandae! Dolor placeat debitis animi illum quo repellendus pariatur, enim doloribus,
                                </p>
                              </div>
                              <div class="resume-row">
                                <h6 class="resume-type">SPECIALIZATION COURSE</h6>
                                <p class="resume-study">
                                  University of studies, Poland, Cracow
                                </p>
                                <p class="resume-date text-primary">
                                  Jan 2004 - Dec 2006
                                </p>
                                <p class="resume-text">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus nobis animi assumenda sint recusandae! Dolor placeat debitis animi illum quo repellendus pariatur, enim doloribus
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-resume">
                          <h6 class="resume-title">
                            Experience
                          </h6>
                          <div class="resume-content">
                            <div class="resume-inner">
                              <div class="resume-row">
                                <h6 class="resume-type">WEBDESIGNER & FRONT-END</h6>
                                <p class="resume-study">
                                  University of studies, Poland, Cracow
                                </p>
                                <p class="resume-date text-primary">
                                  Jan 2004 - Dec 2006
                                </p>
                                <p class="resume-text">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus nobis animi assumenda sint recusandae! Dolor placeat debitis animi illum quo repellendus pariatur, enim doloribus, deleniti!
                                </p>
                              </div>
                              <div class="resume-row">
                                <h6 class="resume-type">SPECIALIZATION COURSE</h6>
                                <p class="resume-study">
                                  University of studies, Poland, Cracow
                                </p>
                                <p class="resume-date text-primary">
                                  Jan 2004 - Dec 2006
                                </p>
                                <p class="resume-text">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus nobis animi assumenda sint recusandae! Dolor placeat debitis animi illum quo repellendus pariatur, enim doloribus, deleniti!!
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page6" class="pp-scrollable section section-4">
      <div class="scroll-wrap">
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title text-dark hidden-xs hidden-sm">
                <span>Partners</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro overflow-hidden">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row-partners">
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/1.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/2.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/1.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/2.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/1.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/2.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/1.png">
                            </div>
                          </div>
                          <div class="col-partner">
                            <div class="partner-inner">
                              <img alt="" src="<?= PATH_ASSETS ?>front/images/partners/2.png">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page7" class="pp-scrollable text-white section section-6">
      <div class="scroll-wrap">
        <div class="section-bg" style="background-image:url(assets/front/images/bg/bg4.jpg);"></div>
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title hidden-xs hidden-sm">
                <span>testimonials</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-6 col-lg-5">
                        <span class="icon-quote ion-quote"></span>
                        <h2 class="title-uppercase text-white">creative & dedicated is things that Jonny studio brings for your house</h2>
                      </div>
                      <div class="col-md-5 col-lg-5  col-md-offset-1 col-lg-offset-2">
                        <div class="review-carousel owl-carousel">
                          <div class="review-carousel-item">
                            <div class="text">
                              <p>
                                “ If you are seeking an Interior designer that will understand exactly your needs, and someone who will utilise their creative and technical skills in parity with your taste, then Suzanne at The Jonny Studio is perfect.
                              </p>
                              <p>
                                Thank you so much for all your design and expertise."
                              </p>
                            </div>
                            <div class="review-author">
                              <div class="author-name">
                                David & Elisa
                              </div>
                              <i>Apartment view lake at Brooklyn</i>
                            </div>
                          </div>
                          <div class="review-carousel-item">
                            <div class="text">
                              <p>
                                “ Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi voluptates officia molestias fugit ipsum, blanditiis minima voluptatibus sit in laudantium doloribus, illum, reiciendis similique distinctio asperiores earum dolore eveniet eius."
                              </p>
                              <p>
                                Thank you so much for all your design and expertise."
                              </p>
                            </div>
                            <div class="review-author">
                              <div class="author-name">
                                Amanda
                              </div>
                              <i>Apartment view lake at Brooklyn</i>
                            </div>
                          </div>
                          <div class="review-carousel-item">
                            <div class="text">
                              <p>
                                “ If you are seeking an Interior designer that will understand exactly your needs, and someone who will utilise their creative and technical skills in parity with your taste, then Suzanne at The Jonny Studio is perfect.
                              </p>
                              <p>
                                Thank you so much for all your design and expertise."
                              </p>
                            </div>
                            <div class="review-author">
                              <div class="author-name">
                                John
                              </div>
                              <i>Apartment view lake at Brooklyn</i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div data-anchor="page8" class="pp-scrollable section section-6">
      <div class="scroll-wrap">
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="vertical-title text-dark hidden-xs hidden-sm">
                <span>contact</span>
              </div>
              <div class="boxed">
                <div class="container">
                  <div class="intro overflow-hidden">
                    <div class="row">
                      <div class="col-md-12">
                        <h2 class="title-uppercase">Get In Touch</h2>
                        <div class="contact-info">
                          <form class="js-form" novalidate="novalidate">
                            <div class="row">
                              <div class="form-group col-sm-6">
                                <input type="text" name="name" required="" placeholder="Name*" aria-required="true">
                              </div>
                              <div class="form-group col-sm-6">
                                <input type="email" name="email" placeholder="Email">
                              </div>
                              <div class="form-group col-sm-12">
                                <input type="text" name="subject" placeholder="Subject (Optinal)">
                              </div>
                              <div class="form-group col-sm-12">
                                <textarea name="message" required="" placeholder="Message*" aria-required="true"></textarea>
                              </div>
                              <div class="col-sm-12">
                                <button type="submit" class="btn">Post Comment</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals success -->

  <div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
          <h2 class="modal-title">Thank you</h2>
          <p class="modal-subtitle">
            Your message is successfully sent...
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals error -->

  <div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
          <h2 class="modal-title">Sorry</h2>
          <p class="modal-subtitle">
            Something went wrong
          </p>
        </div>
      </div>
    </div>
  </div>


  <!-- jQuery -->

  <script src="<?= PATH_ASSETS ?>front/js/jquery.min.js"></script>
  <script src="<?= PATH_ASSETS ?>front/js/bootstrap.min.js"></script>
  <script src="<?= PATH_ASSETS ?>front/js/smoothscroll.js"></script>
  <script src="<?= PATH_ASSETS ?>front/js/jquery.validate.min.js"></script>
  <script src="<?= PATH_ASSETS ?>front/js/owl.carousel.min.js"></script>
  <script src="<?= PATH_ASSETS ?>front/js/jquery.pagepiling.js"></script>



  <!-- Scripts -->
  <script src="<?= PATH_ASSETS ?>front/js/scripts.js"></script>
</body>

</html>