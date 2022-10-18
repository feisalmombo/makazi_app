<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Makazi App - Welcome</title>
    <link rel="stylesheet" href="{{ asset('welcome/assets/css/style-welcome.css') }}">

    <style>
        html {
        margin: 40px auto;
        }
        .btn-search {
          background: #C64343;
          border-radius: 0;
          color: #fff;
          border-width: 1px;
          border: #C64343;
          border-color: #C64343;
        }
        .btn-search:link, .btn-search:visited {
          color: #C64343;
        }
        .btn-search:active, .btn-search:hover {
          background: #C64343;
          color: #C64343;
        }
    
        .panel {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        }
    </style>
  </head>
  <body>

<div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
      <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><strong style="color:#BE2434">Makazi</strong></a>
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <div class="form-inline">
            <a href="#" class="help mr-4">Features</a>
          </div>
  
          <div class="form-inline">
            <a href="#" class="about mr-4">Blog</a>
          </div>
  
          <div class="form-inline">
          <a href="#" class="faq mr-4">Contact</a>
          </div>

          <div class="form-inline">
            <a href="{{ route('login') }}" class="faq mr-4">Log In</a>
          </div>
  
       <!--    <div class="form-inline">
          <a href="{{ url('/user/auth/registration_user') }}" class="btn btn-warning sign" style="border-radius: 90px;"><strong style="color:white;">Sign Up</strong></a>
          </div>
 -->
          <div class="form-inline">
          <a href="{{ url('/user/auth/registration_user') }}">Register</a>
          </div>
  
        </div>
      </div>
    </nav>
</div>

<div class="w3l-index-block1">
  <div class="content py-5">
    <div class="container">
      <div class="row align-items-center py-md-5 py-3">
        <div class="col-md-5 content-left pt-md-0 pt-5">
          <h1>Makazi App</h1>
          <p class="mt-3 mb-md-5 mb-4">A platform that voices members issues, drives advocacy
            and increases public resource accountability.</p>
          <a href="#" class="btn btn-warning sign" style="border-radius: 90px;color:white;">Make Contribution</a>
        </div>
        <div class="col-md-7 content-photo mt-md-0 mt-5">
          <img src="{{ asset('welcome/assets/images/welcomelogo12.JPG') }}" class="img-fluid" alt="main image">
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>

<section class="w3l-index-block2 py-5">
  <div class="container py-md-3">
    <div class="row bottom_grids pt-md-3">
      <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block">
          <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <img src="{{ asset('welcome/assets/images/dollar.png') }}" alt="" class="img-fluid" />
            <h3 class="my-3" style="color:#BE2434">Groups</h3>
            <p class="">Our goal is to help our companies maintain or achieve best in class positions. Build an online presence with this professional bootstrap 4 template.</p>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block">
          <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <img src="{{ asset('welcome/assets/images/forums.png') }}" alt="" class="img-fluid" />
            <h3 class="my-3" style="color:#BE2434">Forums</h3>
            <p class="">Our goal is to help our companies maintain or achieve best in class positions. Build an online presence with this professional bootstrap 4 template.</p>
          </a>
        </div>
      </div>
      <div class="col-lg-4 mt-5">
        <div class="s-block">
          <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <img src="{{ asset('welcome/assets/images/forums.png') }}" alt="" class="img-fluid" />
            <h3 class="my-3" style="color:#BE2434">Group Contributions</h3>
            <p class="">Our goal is to help our companies maintain or achieve best in class positions. Build an online presence with this professional bootstrap 4 template.</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="w3l-index-block3">
  <div class="section-info py-5">
    <div class="container py-md-3">
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6 cwp17-image">
          <img src="{{ asset('welcome/assets/images/ultmate.JPG') }}" class="img-fluid" alt="" />
        </div>
        <div class="col-md-6 cwp17-text">
          <h2>Get the ultimate tool and
            learn how to grow your
            finances</h2>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus
            qui blanditiis praesentium voluptatum deleniti atque. Many
            desktop publishing packages and web.. </p>
          <a href="#" style="text-decoration: none;">Get Started</a>
          {{-- <a href="#" class="btn btn-warning sign" style="border-radius: 90px;color:white;">Get Started</a> --}}
        </div>
      </div>
    </div>
  </div>
</section>

<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="row cwp17-two align-items-center">
      <div class="col-md-6 cwp17-text">
        <h2>We offer a full range of
            digital money literacy
            services</h2>
        <p>Latin words, combined with a handful of model sentence
            structures, to generate Lorem Ipsum which looks reasonable.
            The generated Lorem Ipsum is therefore always free.. </p>
        <a href="#" style="text-decoration: none;">Get Started</a>
        {{-- <a href="#" class="btn btn-warning sign" style="border-radius: 90px;color:white;">Get Started</a> --}}
      </div>
      <div class="col-md-6 cwp17-image">
        <img src="{{ asset('welcome/assets/images/offer.JPG') }}" class="img-fluid" alt="" />
      </div>
    </div>
  </div>
</section>

<section class="w3l-index-block9" id="partners">
  <div class="partners py-5">
    {{-- <div class="container py-lg-3">
      <div class="heading text-center mx-auto">
        <h3 class="head">Over 16,000 Companies that trust our amazing product </h3>
      </div>
      <div class="row col-md-10 justify-content-between grid-part text-center mx-auto">
          <div class="parts-w3ls col-sm-2 col-6 mt-5">
            <span class="fa fa-cc-visa"></span>
          </div>
          <div class="parts-w3ls col-sm-2 col-6 mt-5">
            <span class="fa fa-digg"></span>
          </div>
          <div class="parts-w3ls col-sm-2 col-6 mt-5">
            <span class="fa fa-lastfm"></span>
          </div>
          <div class="parts-w3ls col-sm-2 col-6 mt-5">
            <span class="fa fa-cc-discover"></span>
          </div>
          <div class="parts-w3ls col-sm-2 col-6 mt-5">
            <span class="fa fa-ravelry"></span>
          </div>
          <div class="parts-w3ls col-sm-2 col-6 mt-5">
            <span class="fa fa-cc-stripe"></span>
          </div>
        </div>
      </div>
    </div> --}}
</section>
<br>
<br>

<section class="w3l-market-footer">
    <footer class="footer-28">
        <div class="footer-bg-layer">
        <div class="container py-lg-3">
            <div class="row footer-top-28">
            <div class="col-md-6 footer-list-28 mt-5">
                <h1 class="footer-title-28"><strong style="color: #BE2434;">Makazi App</strong></h1>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.</p>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-4 footer-list-28 mt-5">
                        <h6 class="footer-title-28">Contact</h6>
                        <ul>
                        <li><a href="#">128, Riverside Drive,</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 footer-list-28 mt-5">
                        <h6 class="footer-title-28">About</h6>
                        <ul>
                        <li><a href="#">T&C</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Careers</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 footer-list-28 mt-5">
                        <h6 class="footer-title-28">Follow Us</h6>
                        <ul>
                        <li><a href="#">Disclaimer</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            </div>
        </div>


        <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
            <div class="container">
            <p class="copy-footer-28 text-center">Copyright &copy; {{date('Y')}} GetPesa PLC. All rights reserved.
                </p>
            </div>
        </div>
        </div>
    </footer>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
    &#10548;
    </button>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
        } else {
        document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    <!-- /move top -->
</section>

      <!-- jQuery, Bootstrap JS -->
      <script src="{{ asset('welcome/assets/js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('welcome/assets/js/bootstrap.min.js') }} "></script>
      
      <script src="{{ asset('welcome/assets/js/owl.carousel.js') }}"></script>

      <script>
        $(document).ready(function () {
          $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
              0: {
                items: 1,
                nav: false
              },
              480: {
                items: 1,
                nav: false
              },
              667: {
                items: 1,
                nav: true
              },
              1000: {
                items: 1,
                nav: true
              }
            }
          })
        })
      </script>
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>

      <script src="{{ asset('welcome/assets/js/jquery.magnific-popup.min.js') }}"></script>
      <script>
        $(document).ready(function () {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });

          $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
          });
        });
      </script>

</body>
</html>