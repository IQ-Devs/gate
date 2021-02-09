<!DOCTYPE html>

<html>



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Gate - Iraq</title>

    <link rel="icon" href="{{url('assets/css/vlcsnap-2020-11-05-21h43m44s126.png')}}" type="image/x-icon">

<meta property="og:description" content="https://www.gateiraq.com/#team" />



    <meta property="og:image" content="{{url('assets/css/vlcsnap-2020-11-05-21h43m44s126.png')}}" />

    <meta property="og:title" content="Payment Platform" />

    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css?h=2a040cf0e1ca3d6969748dfbe631f050')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{url('assets/css/video.css')}}">

</head>



<body id="page-top">

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">

        <div class="container"><a class="navbar-brand" href="#page-top">GateIraq</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"

                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>

            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="nav navbar-nav ml-auto text-uppercase">

                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>

                <!--    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li> -->

                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>

                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>

{{--                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="/login">Sign in</a></li>--}}
                                @if (Auth::guest())
                        <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{ url('/register') }}">Register</a></li>
                                @else
                        <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a></li>
                                    <li class="nav-item dropdown" >

                                        <a href="#"  class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>


                                        <ul class="dropdown-menu dropdown-primary" role="menu">
                                            <li class="" role="presentation"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                        </ul>
                                    </li>

                                @endif
                  <!--  <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li> -->

                </ul>

            </div>

        </div>

    </nav>

    <header class="masthead">

    	  <div class="overlay"></div>

  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">

    <source src="{{url('assets/img/back.mp4')}}" type="video/mp4">

  </video>

        <div class="container">

            <div class="intro-text">

                <div class="intro-lead-in"><span>Welcome To Our Platfrom!</span></div>

                <div class="intro-heading text-uppercase"><span>It's Nice To Meet You</span></div><a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="#services">Tell me more</a></div>

        </div>

    </header>

    <section id="services">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="text-uppercase section-heading">Services</h2>

                    <h3 class="text-muted section-subheading">We provided</h3>

                </div>

            </div>

            <div class="row text-center">

                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></span>

                    <h4 class="section-heading">E-Payment</h4>

                    <p class="text-muted">

Now your business can have a special payment method that allows your customers to pay online.</p>

                </div>

                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-laptop fa-stack-1x fa-inverse"></i></span>

                    <h4 class="section-heading">Responsive Design</h4>

                    <p class="text-muted">

The interface is simple and easy to use and allows communication with a professional support team.</p>

                </div>

                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-lock fa-stack-1x fa-inverse"></i></span>

                    <h4 class="section-heading">Web Security</h4>

                    <p class="text-muted">

We provide you with confidentiality in your transactions and provide fast ways to process your requests.</p>

                </div>

            </div>

        </div>

    </section>

  <!--  <section id="portfolio" class="bg-light">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="text-uppercase section-heading">Portfolio</h2>

                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>

                </div>

            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4 portfolio-item">

                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>

                        </div><img class="img-fluid" src="{{url('assets/img/portfolio/1-thumbnail.jpg?h=41aa7626f88f088a2c71d960df1da583')}}                                 "></a>

                    <div class="portfolio-caption">

                        <h4>Threads</h4>

                        <p class="text-muted">Illustration</p>

                    </div>

                </div>

                <div class="col-sm-6 col-md-4 portfolio-item">

                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>

                        </div><img class="img-fluid" src="{{url('assets/img/portfolio/1-thumbnail.jpg?h=41aa7626f88f088a2c71d960df1da583assets/img/portfolio/2-thumbnail.jpg?h=e0cd73f9cd729a71c99bb73d59fdff7a')}}"></a>

                    <div class="portfolio-caption">

                        <h4>Explore</h4>

                        <p class="text-muted">Graphic Design</p>

                    </div>

                </div>

                <div class="col-sm-6 col-md-4 portfolio-item">

                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>

                        </div><img class="img-fluid" src="assets/img/portfolio/3-thumbnail.jpg?h=21014624943ca4e4f89cd0f1882d6e7f"></a>

                    <div class="portfolio-caption">

                        <h4>Finish</h4>

                        <p class="text-muted">Identity</p>

                    </div>

                </div>

                <div class="col-sm-6 col-md-4 portfolio-item">

                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>

                        </div><img class="img-fluid" src="assets/img/portfolio/4-thumbnail.jpg?h=62e85a384b97007129548e987c155861"></a>

                    <div class="portfolio-caption">

                        <h4>Lines</h4>

                        <p class="text-muted">Branding</p>

                    </div>

                </div>

                <div class="col-sm-6 col-md-4 portfolio-item">

                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>

                        </div><img class="img-fluid img-fluid" src="assets/img/portfolio/5-thumbnail.jpg?h=71496ae4d377a216a250e5349e5dab7c"></a>

                    <div class="portfolio-caption">

                        <h4>Southwest</h4>

                        <p class="text-muted">Website Design</p>

                    </div>

                </div>

                <div class="col-sm-6 col-md-4 portfolio-item">

                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">

                        <div class="portfolio-hover">

                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>

                        </div><img class="img-fluid" src="assets/img/portfolio/6-thumbnail.jpg?h=f641bb32de99d994a495276cef6faf04"></a>

                    <div class="portfolio-caption">

                        <h4>Window</h4>

                        <p class="text-muted">Photography</p>

                    </div>

                </div>

            </div>

        </div>  -->

{{--    </section>--}}

    <section id="about">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="text-uppercase">About</h2>

                    <h3 class="text-muted section-subheading">That's where the story begins.</h3>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <ul class="list-group timeline">

                        <li class="list-group-item">

                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{url('assets/img/about/1.jpg?h=d6348b0ac62136468dbff141c95c313b')}}"></div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4>2017</h4>

                                    <h4 class="subheading">The seller has a sales problem

</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">A lot of sellers are having problems with sales, although everything seems right, as they have all the ingredients like strategic site and brand with a lot of followers and subscribers to their pages , we decided to investigate the problem and find a solution.

</p>

                                </div>

                            </div>

                        </li>

                        <li class="list-group-item timeline-inverted">

                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{url('assets/img/about/2.jpg?h=a0bc1f1302cca7e34fe4a8a6ede823be')}}"></div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4>2018</h4>

                                    <h4 class="subheading">Understand Phase</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">We have reached out to the sellers and talked about their problems to find innovative solutions that will help them flourish their businesses</p>

                                </div>

                            </div>

                        </li>

                        <li class="list-group-item">

                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{url('assets/img/about/3.jpg?h=90e7913e72276cee000a30cb05a62998')}}"></div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4>2019</h4>

                                    <h4 class="subheading">Brainstorm Phase

 </h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">We have considered all possible and technical solutions especially, and we have concluded that the best solution is to provide an electronic payment gateway that facilitates both parties the payment process</p>

                                </div>

                            </div>

                        </li>

                        <li class="list-group-item timeline-inverted">

                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{url('assets/img/about/4.jpg?h=dd75735e722d131b77b4cf11c203f0fa')}}"></div>

                            <div class="timeline-panel">

                                <div class="timeline-heading">

                                    <h4>2020</h4>

                                    <h4 class="subheading">Prototype Phase</h4>

                                </div>

                                <div class="timeline-body">

                                    <p class="text-muted">After conducting a feasibility study and hiring several experts, we decided to start working in January 2020.

The work has taken several months and the work is continuing and we look forward to your support.</p>

                                </div>

                            </div>

                        </li>

                        <li class="list-group-item timeline-inverted">

                            <div class="timeline-image">

                                <h4>Be Part<br>&nbsp;Of Our<br>&nbsp;Story!</h4>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    <section id="team" class="bg-light">

        <div class="container">

            <div class="row">

                <!--

                <div class="col-sm-4">

                    <div class="team-member"><img class="rounded-circle mx-auto" src="{{url('assets/img/team/1.jpg?h=c434e0c7fcafcc377eb28d401bc929c5')}}">

                        <h4>Kay Garland</h4>

                        <p class="text-muted">Lead Designer</p>

                        <ul class="list-inline social-buttons">

                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>

                        </ul>

                    </div>

                </div> --> <div class="col-sm-4"></div>

                <div class="col-sm-4">

                    <div class="team-member"><img class="rounded-circle mx-auto" src="{{url('assets/img/team/2.png')}}">

                        <h4>Ibrahem Aldulaimi</h4>

                        <p class="text-muted">Project Owner</p>

                        <ul class="list-inline social-buttons">

                            <li class="list-inline-item"><a href="https://twitter.com/IQ_ALD"><i class="fa fa-twitter"></i></a></li>

                            <li class="list-inline-item"><a href="https://www.facebook.com/IQ.ALD"><i class="fa fa-facebook"></i></a></li>

                            <li class="list-inline-item"><a href="https://www.linkedin.com/in/iqald/"><i class="fa fa-linkedin"></i></a></li>

                        </ul>

                    </div>

                </div>

             <div class="col-sm-4"></div>    <!--

                <div class="col-sm-4">

                    <div class="team-member"><img class="rounded-circle mx-auto" src="{{url('assets/img/team/3.jpg?h=ea6dfd472215c4f04980b45cace43204')}}">

                        <h4>Diana Pertersen</h4>

                        <p class="text-muted">Lead Developer</p>

                        <ul class="list-inline social-buttons">

                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>

                        </ul>

                    </div>

                </div> -->

            </div>

        </div>

    </section>

    <!--

    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/creative-market.jpg?h=bfca663a296efd1d8aaa6a7f2870bc44"></a></div>

                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/designmodo.jpg?h=116a831df4526f53dd7289e89a0476dd"></a></div>

                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/envato.jpg?h=8a0748751b791c95127598b42fe9ab61"></a></div>

                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/clients/themeforest.jpg?h=7c2a20dbf3ae94f3f382e74dc9ef5f19"></a></div>

            </div>

        </div>

    </section>



    -->

   <!-- <section id="contact" style="background-image:url('assets/img/map-image.png?h=dde716a63e31eca254a82a274d4f56c0');">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h2 class="text-uppercase section-heading">Contact Us</h2>

                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <form id="contactForm" name="contactForm" novalidate="novalidate">

                        <div class="form-row">

                            <div class="col col-md-6">

                                <div class="form-group"><input class="form-control" type="text" id="name" placeholder="Your Name *" required=""><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>

                                <div class="form-group"><input class="form-control" type="email" id="email" placeholder="Your Email *" required=""><small class="form-text text-danger help-block lead"></small></div>

                                <div class="form-group"><input class="form-control" type="tel" placeholder="Your Phone *" required=""><small class="form-text text-danger help-block lead"></small></div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"><textarea class="form-control" id="message" placeholder="Your Message *" required=""></textarea><small class="form-text text-danger help-block lead"></small></div>

                            </div>

                            <div class="col">

                                <div class="clearfix"></div>

                            </div>

                            <div class="col-lg-12 text-center">

                                <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button></div>

                        </div>

                    </form>

                </div>

            </div>

        </div>  -->

    </section>

    <footer>

        <div class="container">

            <div class="row">

                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© GateIraq 2020</span></div>

                <div class="col-md-4">

                    <ul class="list-inline social-buttons">

                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>

                    </ul>

                </div>

                <div class="col-md-4">

                    <ul class="list-inline quicklinks">

                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>

                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="assets/js/script.min.js?h=14fbe564ae668621587e502e401599ff"></script>

</body>



</html>
