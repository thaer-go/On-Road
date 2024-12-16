<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 5</title>
        <!-- <link rel="stylesheet" href="thaer_website/front_section/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="front_section/css/bootstrap.min.css">
        <link rel="stylesheet" href="front_section/css/all.min.css">
        <link rel="stylesheet" href="front_section/css/bootstrap5.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand text-light" href="#">
                    <img class="img-fluid" src="front_section/images/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="main">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active p-2 p-lg-3" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <div class="search ps-3 pe-3 d-none d-lg-block">
                        <i class="fa-solid fa-magnifying-glass"></i>    
                    </div>
                    <a class="btn main-btn rounded-pill" href="#">Login</a>
                </div>
            </div>
        </nav>
        <div class="landing d-flex justify-content-center align-items-center">
            <div class="text-center text-light">
                <h1>Taste the Creativity</h1>
                <p class="mb-5 fs-6 text-white-50">We make awesome graphic and web design</p>
                <a class="btn main-btn rounded-pill px-2 py-2" href="#">Get Started</a>
            </div>
        </div>
        <div class="features text-center pt-5 pb-5">
            <div class="container">
                <div class="main-title mb-5 mt-5 position-relative">
                    <img class="mb-4" src="front_section/images/title.png" alt="">
                    <h2>We are Good at</h2>
                    <p class="text-uppercase text-black-50">some of these stuff under</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="feat">
                            <div class="icon-holder position-relative">
                                <i class="fa-solid fa-1 position-absolute bottom-0 number"></i>
                                <i class="fa-solid fa-4x fa-pencil position-absolute bottom-0 icon"></i>
                            </div>
                            <h4 class="mb-4 mt-4 text-uppercase">Graphic Design</h4>
                            <p class="lh-lg text-black-50">
                            Pellentesque in ipsum id orci porta dapibus. 
                            Vivamus magna justo, lacinia eget consectetur sed, 
                            convallis at tellus.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feat">
                            <div class="icon-holder position-relative">
                                <i class="fa-solid fa-2 position-absolute bottom-0 number"></i>
                                <i class="fa-solid fa-4x fa-tv position-absolute bottom-0 icon"></i>
                            </div>
                            <h4 class="mb-4 mt-4 text-uppercase">Graphic Design</h4>
                            <p class="lh-lg text-black-50">
                            Pellentesque in ipsum id orci porta dapibus. 
                            Vivamus magna justo, lacinia eget consectetur sed, 
                            convallis at tellus.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feat">
                            <div class="icon-holder position-relative">
                                <i class="fa-solid fa-3 position-absolute bottom-0 number"></i>
                                <i class="fa-solid fa-4x fa-plug position-absolute bottom-0 icon"></i>
                            </div>
                            <h4 class="mb-4 mt-4 text-uppercase">Graphic Design</h4>
                            <p class="lh-lg text-black-50">
                            Pellentesque in ipsum id orci porta dapibus. 
                            Vivamus magna justo, lacinia eget consectetur sed, 
                            convallis at tellus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-work text-center pt-5 pb-5">
            <div class="container">
                <div class="main-title mb-5 mt-5 position-relative">
                    <img class="mb-4" src="front_section/images/title.png" alt="">
                    <h2>We Make This</h2>
                    <p class="text-uppercase text-black-50">Prepare To Be Amazed</p>
                </div>
                <ul class="list-unstyled d-flex justify-content-center mb-5 mt-5">
                    <li class="active rounded-pill">All</li>
                    <li>Design</li>
                    <li>Code</li>
                    <li>Photo</li>
                    <li>App</li>
                </ul>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-02.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-03.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-04.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-05.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-06.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-07.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box bg-white" data-work="application">
                            <img class="img-fluid" src="front_section/images/work-08.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a class="btn main-btn rounded-pill px-2 py-2" href="#">I Want More</a>
                </div>
            </div>
        </div>
        <div class="stuff text-center pt-5 position-relative">
            <div class="container">
                <div class="main-title mb-5 mt-5 position-relative">
                    <img class="mb-4" src="front_section/images/title.png" alt="">
                    <h2>Some Stuff About Us</h2>
                    <p class="text-uppercase text-black-50">The Great Team</p>
                </div>
                <p class="description text-center mb-5 text-black-50 m-auto">
                    Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, 
                    eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. 
                    Proin eget tortor risus. Donec sollicitudin molestie malesuada.
                </p>
                <div class="row">
                    <div class="col-lg-4 text-center text-md-start">
                        <div class="text">
                            <h4>Retina Design</h4>
                            <p class="text-black-50 fs-6">
                                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. 
                                Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a
                            </p>
                            <p class="text-black-50 fs-6">
                                Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, 
                                eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. 
                                Proin eget tortor risus. Donec sollicitudin molestie malesuada.
                            </p>
                            <a class="btn main-btn rounded-pill px-2 py-2" href="#">Order My One</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <img class="img-fluid" src="front_section/images/laptop.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="team pt-5 pb-5 text-center">
            <div class="container pt-5 pb-5">
                <h2 class="fw-bold">Meet The Team</h2>
                <p class="text-black-50 mb-5">
                    Donec rutrum congue leo eget malesuada. 
                    Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. 
                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. 
                    Donec sollicitudin molestie malesuada
                </p>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="box bg-white">
                            <img class="img-fluid" src="front_section/images/team-1.png" alt="">
                            <h4 class="p-3 text-light">Luke Skywalker</h4>
                            <blockquote class="p-3 text-black-50">
                                “I don't understand how we got by those troops. I thought we were dead.“
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="box bg-white">
                            <img class="img-fluid" src="front_section/images/team-2.png" alt="">
                            <h4 class="p-3 text-light">Luke Skywalker</h4>
                            <blockquote class="p-3 text-black-50">
                                “I don't understand how we got by those troops. I thought we were dead.“
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="box bg-white">
                            <img class="img-fluid" src="front_section/images/team-3.png" alt="">
                            <h4 class="p-3 text-light">Luke Skywalker</h4>
                            <blockquote class="p-3 text-black-50">
                                “I don't understand how we got by those troops. I thought we were dead.“
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="box bg-white">
                            <img class="img-fluid" src="front_section/images/team-4.png" alt="">
                            <h4 class="p-3 text-light">Luke Skywalker</h4>
                            <blockquote class="p-3 text-black-50">
                                “I don't understand how we got by those troops. I thought we were dead.“
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="techs text-center pb-5 pt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-2 col-md-4 col-lg-2 mt-3 mb-3">
                        <img src="front_section/images/tech-1.png" alt="">
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-2 mt-3 mb-3">
                        <img src="front_section/images/tech-2.png" alt="">
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-2 mt-3 mb-3">
                        <img src="front_section/images/tech-3.png" alt="">
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-2 mt-3 mb-3">
                        <img src="front_section/images/tech-4.png" alt="">
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-2 mt-3 mb-3">
                        <img src="front_section/images/tech-1.png" alt="">
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-2 mt-3 mb-3">
                        <img src="front_section/images/tech-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="project text-center text-light pt-5 pb-5">
            <h2 class="pt-5">Start Your Project Now</h2>
            <p class="text-white-50">
                Leave your description and we start the engine.Don't worry,you can cancel anytime
            </p>
            <div class="d-flex justify-content-center mt-5 mb-5">
                <a class="btn main-btn rounded-pill px-2 py-2" href="#">Start Project</a>
            </div>
        </div>
        <div class="blog pt-5 pb-5">
            <div class="container">
                <div class="main-title text-center mb-5 mt-5 position-relative">
                    <img class="mb-4" src="front_section/images/title.png" alt="">
                    <h2>Read Our Blog</h2>
                    <p class="text-uppercase text-black-50">New Stories</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                        <img src="front_section/images/blog-1.jpg" class="card-img-top" alt="Blog Post">
                        <div class="card-body">
                            <span class="text-back-50">Jan 17, 2022</span>
                            <h5 class="card-title">Some Awesome Blog Title Here</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                        <img src="front_section/images/blog-2.jpg" class="card-img-top" alt="Blog Post">
                        <div class="card-body">
                            <span class="text-back-50">Jan 17, 2022</span>
                            <h5 class="card-title">Some Awesome Blog Title Here</h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                        <img src="front_section/images/blog-3.jpg" class="card-img-top" alt="Blog Post">
                        <div class="card-body">
                            <span class="text-back-50">Jan 17, 2022</span>
                            <h5 class="card-title">Some Awesome Blog Title Here</h5>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <a class="btn main-btn rounded-pill px-2 py-2" href="#">More Stories</a>
                </div>
            </div>
        </div>
        <div class="subscribe pt-5 pb-5 text-center text-md-start">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="fw-bold fs-5 mb-3">Subscribe to our Newsletter:</div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-mb-5">
                        <input class="w-100 bg-transparent text-light p-2" type="text" name="" placeholder="Enter Your Email Address">
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <input  class="btn rounded-pill" type="submit" value="Subscribe">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer pt-5 pb-5 text-white-50 text-md-start">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="info mb-4">
                            <img class="img-fluid mb-5" src="front_section/images/logo.png" alt="logo">
                            <p>
                                Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, 
                                lacinia eget consectetur sed, convallis at tellus.
                            </p>
                            <div class="copyright">
                                Created By <span>Graphberry</span>
                                <div>&copy; - 2022 <span>Bondi Inc</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <h5 class="text-light">Links</h5>
                        <ul class="list-unstyled">
                            <li class="pb-3">Home</li>
                            <li class="pb-3">Our Services</li>
                            <li class="pb-3">Portfolio</li>
                            <li class="pb-3">Testimonials</li>
                            <li class="pb-3">Support</li>
                            <li class="pb-3">Terms and Condition</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <h5 class="text-light">About Us</h5>
                        <ul class="list-unstyled">
                            <li class="pb-3">Sign in</li>
                            <li class="pb-3">Register</li>
                            <li class="pb-3">About Us</li>
                            <li class="pb-3">Blog</li>
                            <li class="pb-3">Contact Us</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact">
                            <h5 class="text-light">Contact Us</h5>
                            <p class="lh-lg mb-5">Get in touch with us via mail phone.We are waiting for your call or message</p>
                            <a class="btn main-btn rounded-pill w-100" href="#">Graphberry@gmail.com</a>
                            <ul class="list-unstyled d-flex gap-3 mt-5">
                                <li>
                                    <a class="d-block text-light" href="#">
                                        <i class="fa-brands fa-facebook facebook p-2 rounded-pill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-block text-light" href="#">
                                        <i class="fa-brands fa-twitter twitter p-2 rounded-pill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-block text-light" href="#">
                                        <i class="fa-brands fa-linkedin linkedin p-2 rounded-pill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-block text-light" href="#">
                                        <i class="fa-brands fa-youtube youtube p-2 rounded-pill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="front_section/js/bootstrap.bundle.min.js"></script>
        <script src="front_section/js/all.min.js"></script>
        <script src="front_section/js/main.js"></script>
    </body>
</html>
