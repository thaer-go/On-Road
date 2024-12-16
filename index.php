    <?php   
        include "website/links.php";
        $change = 'En';
        if(isset($_GET['lang'])) {$change = $_GET['lang'] ?? 'En';};
        include "website/back_section/languages/" . $change . ".php";
    ?>
    <!-- scroll to top -->
    <div id="mybtn" class="mybtn"><i class="fa-solid fa-circle-up fa-2xl" style="font-size:50px"></i></div>
    <!-- scroll to top -->
    <!-- Start Loading page -->
    <div class="loading">
        <div class="custom-container">
            <div class="image">
                <img src="website/front_section/images/1x/Artboard 3.png" alt="logo">
            </div>
            <div class="heading onRoad">
                <h1>on road</h1>
                <h4>Please Wait
                    <span><i class="fa-solid fa-circle"></i></span>
                    <span><i class="fa-solid fa-circle"></i></span>
                    <span><i class="fa-solid fa-circle"></i></span>
                </h4>
            </div>
        </div>
    </div>
    <!-- End Loading page -->
    <!-- Start popup guid page -->
    <div class="guid-page">
        <div class="custom-container">
            <h1><?php echo $lang['guid-page']['h1-1']?></h1>
            <h4><?php echo $lang['guid-page']['h4-1']?></h4>
            <div class="moving">
                <span class="back"><i class="fa-solid fa-chevron-left"></i> <?php echo $lang['guid-page']['span-1']?></span>
                <span class="next"><?php echo $lang['guid-page']['span-2']?> <i class="fa-solid fa-chevron-right"></i></span>
            </div>
            <!-- on-road -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-1']?></h6>
                <p><?php echo $lang['guid-page']['p-1']?></p>
                <ul>
                    <li><?php echo $lang['guid-page']['li-1']?></li>
                    <li><?php echo $lang['guid-page']['li-2']?> 
                        <a href="https://www.pinterest.com/pin/450148925247663622/" target="_blank">
                        <?php echo $lang['guid-page']['a-1']?></a>
                    </li>
                </ul>
            </div>
            <!-- cateogires -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-1']?></h6>
                <p><?php echo $lang['guid-page']['p-2']?></p>
            </div>
            <!-- service -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-1']?></h6>
                <p><?php echo $lang['guid-page']['p-2']?></p>
            </div>
            <!-- Logo -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-1']?></h6>
                <p><?php echo $lang['guid-page']['p-10']?></p>
            </div>
            <!-- resume -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-4']?></h6>
                <p><?php echo $lang['guid-page']['p-4']?></p>
            </div>
            <!-- contact -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-1']?></h6>
                <p><?php echo $lang['guid-page']['p-2']?></p>
            </div>
            <!-- sign in -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-6']?></h6>
                <p><?php echo $lang['guid-page']['p-6']?></p>
                <ul>
                    <li><?php echo $lang['guid-page']['li-3']?></li>
                    <li><?php echo $lang['guid-page']['li-4']?></li>
                </ul>
            </div>
            <!-- langauges -->
            <div class="content">
                <h6><?php echo $lang['guid-page']['h6-7']?></h6>
                <p><?php echo $lang['guid-page']['p-7']?></p>
                <p><?php echo $lang['guid-page']['p-8']?></p>
                <p><?php echo $lang['guid-page']['p-9']?></p>
            </div>
        </div>
    </div>
    <!-- End popup guid page -->
    <!-- Start a slide show -->
    <div id="carouselExampleCaptions" class="carousel slide for-tow" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="website/front_section/images/background-1(2).jpg" class="d-block" alt="..." style="height:100%; object-fit:cover; object-position:20% 80%">
                        <div class="carousel-caption d-none d-md-block">
                            <h1><?php echo $lang['carousel-inner']['h3'] ?></h1>
                            <p><?php echo $lang['carousel-inner']['p3']?>]</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!-- <img src="website/front_section/images/background-2.jpg" class="d-block w-100" alt="..." style="height:100%; object-fit:cover; object-position:center bottom"> -->
                        <video width="100%" autoplay loop>
                            <source src="website/front_section/images/background-vedio(2).mp4" type="video/mp4">
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                            <h1><?php echo $lang['carousel-inner']['h2'] ?></h1>
                            <p><?php echo $lang['carousel-inner']['p2']?>]</p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="website/front_section/images/background-3 (2).jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1><?php echo $lang['carousel-inner']['h1'] ?></h1>
                            <p><?php echo $lang['carousel-inner']['p1']?>]</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
    </div>
    <!-- End a slide show -->
    <!-- Start a navbar for phone -->
    <div class="navbar-phone">
        <div class="custom-container">
            <span id="phone-menu"><i class="fa-solid fa-bars"></i></span>
            <input type="search" name="search" id="">
            <span><a href="members/signin.php"><i class="fa-solid fa-user"></i></a></span>
        </div>
        <ul data-menu="closed">
            <li><?php echo $lang['navbar']['li-2']?></li>
            <li><?php echo $lang['navbar']['li-3']?></li>
            <li><a href="resume.php" style="color:var(--green2-color)"><?php echo $lang['navbar']['li-4']?></a></li>
            <li><?php echo $lang['navbar']['li-5']?></li>
            <li class="trans" data-plog="ru"><a href="?lang=Ru"><?php echo $lang['navbar']['li-7']?></a></li>
        </ul>
    </div>
    <!-- End a navbar for phone -->
    <!-- Start a header for phone -->
    <div class="header-phone">
        <div class="phone-image">
            <img src="website/front_section/images/1x/Artboard 3.png" alt="">
        </div>
        <div class="custom-container">
            <h1>On-Road</h1>
            <h4><?php echo $lang['header-phone']['h4']?></h4>
            <h5><?php echo $lang['header-phone']['h5']?></h>
        </div>
    </div>
    <!-- End a header for phone -->
    <!-- Start categories Section -->
    <div id="categories" class="categories pt-5 pb-5">
        <div class="container">
            <span><?php echo $lang['categories']['span'] ?></span>
            <h1><?php echo $lang['categories']['h1'] ?></h1>
            <p><?php echo $lang['categories']['p'] ?></p>
            <div class="slider-container">
                <div class="slide">
                    <div class="s-img">
                        <img src="website/front_section/images/categories-2.png" alt="">
                    </div>
                    <h6><?php echo $lang['categories']['h6-1'] ?></h6>
                    <span><?php echo $lang['categories']['span-2'] ?></span>
                </div>
                <div class="slide active">
                    <div class="s-img">
                        <img src="website/front_section/images/categories-5.png" alt="">
                    </div>
                    <h6><?php echo $lang['categories']['h6-1'] ?></h6>
                    <span><?php echo $lang['categories']['span-2'] ?></span>
                </div>
                <div class="slide">
                    <div class="s-img">
                        <img src="website/front_section/images/categories-1.png" alt="">
                    </div>
                    <h6><?php echo $lang['categories']['h6-1'] ?></h6>
                    <span><?php echo $lang['categories']['span-2'] ?></span>
                </div>
            </div>
            <div class="selectors">
                <div class="selector prev"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="selector next"><i class="fa-solid fa-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <!-- End categories Section -->
    <!-- Start service Section -->
    <div id="service" class="service box-shadow">
        <div class="fraction custom">
            <div class="serv-img">
                <img src="website/front_section/images/fraction-11.jpg" alt="">
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-1']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-1']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
            <div class="serv-img">
                <!-- <img src="website/front_section/images/fraction-4.jpg" alt=""> -->
                <video width="100%" autoplay loop>
                    <source src="website/front_section/images/fraction-2.mp4" type="video/mp4">
                </video>
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-2']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-2']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
            <div class="serv-img">
                <img src="website/front_section/images/fraction-1.jpg" alt="">
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-3']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-3']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
            <div class="serv-img">
                <img src="website/front_section/images/fraction-2.jpg" alt="">
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-4']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-4']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
        </div>
        <div class="fraction">
            <div class="three-starts">
                <div class="starts">
                    <span>*</span>
                    <span>*</span>
                    <span>*</span>
                </div>
                <h4><?php echo $lang['three-starts']['h4']?></h4>
                <h2><?php echo $lang['three-starts']['h2']?></h2>
                <p><?php echo $lang['three-starts']['p']?></p>
                <p>
                    <img src="website/front_section/images/1x/Artboard 3.png" style="width:10%" alt="">
                </p>
                <span><?php echo $lang['three-starts']['span']?></span>
            </div>
        </div>
        <div class="fraction">
            <div class="three-starts">
                <div class="starts">
                    <span>*</span>
                    <span>*</span>
                    <span>*</span>
                </div>
                <h4><?php echo $lang['three-starts']['h4']?></h4>
                <h2><?php echo $lang['three-starts']['h2']?></h2>
                <p><?php echo $lang['three-starts']['p']?></p>
                <p>
                    <img src="website/front_section/images/1x/Artboard 3.png" style="width:10%" alt="">
                </p>
                <span><?php echo $lang['three-starts']['span']?></span>
            </div>
        </div>
        <div class="fraction custom">
            <div class="serv-img">
                <!-- <img src="website/front_section/images/fraction-1.jpg" alt=""> -->
                <video width="100%" loop autoplay>
                    <source src="website/front_section/images/fraction-4.mp4" type="video/mp4">
                </video>
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-5']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-5']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
            <div class="serv-img">
                <!-- <img src="website/front_section/images/fraction-5.jpg" alt=""> -->
                <video width="100%" loop autoplay>
                    <source src="website/front_section/images/fraction-6.mp4" type="video/mp4">
                </video>
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-6']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-6']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
            <div class="serv-img">
                <img src="website/front_section/images/fraction-10.jpg" alt="">
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-7']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-7']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
            <div class="serv-img">
                <img src="website/front_section/images/fraction-4.jpg" alt="">
                <span><?php echo $lang['service']['span_1']?></span>
                <h6><?php echo $lang['service']['h6-8']?></h6>
                <div class="appear">
                    <h6><?php echo $lang['service']['span_1']?></h6>
                    <h4><?php echo $lang['service']['h6-8']?></h4>
                    <span><?php echo $lang['service']['span_2']?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End service Section -->
    <!-- Start About Section -->
    <div id="about" class="about">
        <div class="container">
            <img src="website/front_section/images/1x/Artboard 3.png" alt="">
            <p><?php echo $lang['about']['p']?></p>
            <span><?php echo $lang['about']['span-1']?><span class="colored"><?php echo $lang['about']['span-2']?></span></span>
        </div>
    </div>
    <!-- End About Section -->
    <!-- Start Latest News Section -->
    <div id="news" class="latest-news pt-5 pb-5"> 
        <span class="text-center d-block"><?php echo $lang['news']['span']?></span>
        <h1 class="text-center text-light"><?php echo $lang['news']['h1']?></h1>
        <p class="text-center"><?php echo $lang['news']['p']?></p>
        <div class="custom-container">
            <div class="news-grid">
                <div>
                    <div class="btn-news">
                        <img src="website/front_section/images/background-13.jpg" alt="">
                        <span><?php echo $lang['news']['news-grid']['span_2'] ?></span>
                    </div>
                    <div class="container">
                        <h6><?php echo $lang['news']['news-grid']['h6-1'] ?></h6>
                        <h5 class="text-light"><?php echo $lang['news']['news-grid']['h5-1'] ?></h5>
                        <p><?php echo $lang['news']['news-grid']['p-1'] ?></p>
                    </div>
                </div>
                <div>
                    <div class="btn-news">
                        <img src="website/front_section/images/background-14.jpg" alt="">
                        <span><?php echo $lang['news']['news-grid']['span_2'] ?></span>
                    </div>
                    <div class="container">
                        <h6><?php echo $lang['news']['news-grid']['h6-2'] ?></h6>
                        <h5 class="text-light"><?php echo $lang['news']['news-grid']['h5-2'] ?></h5>
                        <p><?php echo $lang['news']['news-grid']['p-2'] ?></p>
                    </div>
                </div>
                <div>
                    <div class="btn-news">
                        <video width="100%" height="100%" autoplay muted loop>
                            <source src="website/front_section/images/news-video.mp4" type="video/mp4">
                        </video>
                        <span><?php echo $lang['news']['news-grid']['span_2'] ?></span>
                    </div>
                    <div class="container">
                        <h6><?php echo $lang['news']['news-grid']['h6-3'] ?></h6>
                        <h5 class="text-light"><?php echo $lang['news']['news-grid']['h6-3'] ?></h5>
                        <p><?php echo $lang['news']['news-grid']['p-3'] ?></p>
                    </div>
                </div>
                <div>
                    <div class="btn-news">
                        <video width="100%" autoplay muted loop>
                            <source src="website/front_section/images/news-video(2).mp4" type="video/mp4">
                        </video>
                        <span><?php echo $lang['news']['news-grid']['span_2'] ?></span>
                    </div>
                    <div class="container">
                        <h6><?php echo $lang['news']['news-grid']['h6-4'] ?></h6>
                        <h5 class="text-light"><?php echo $lang['news']['news-grid']['h5-4'] ?></h5>
                        <p><?php echo $lang['news']['news-grid']['p-4'] ?></p>
                    </div>
                </div>
                <div>
                    <div class="btn-news">
                        <img src="website/front_section/images/background-15.jpg" alt="">
                        <span><?php echo $lang['news']['news-grid']['span-5'] ?></span>
                    </div>
                    <div class="container">
                        <h6><?php echo $lang['news']['news-grid']['h6-5'] ?></h6>
                        <h5 class="text-light"><?php echo $lang['news']['news-grid']['h5-5'] ?></h5>
                        <p><?php echo $lang['news']['news-grid']['p-5'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-send pt-5 pb-5">
        <div class="con-custom">
            <div>
                <span><?php echo $lang['news-send']['span']?></span>
                <h3><?php echo $lang['news-send']['h3']?></h3>
            </div>
            <div>
                <p><?php echo $lang['news-send']['p']?></p>
                <form action="">
                    <input type="text" name="" id="">
                    <input type="text" name="" id="">
                    <span type="submit"><i class="fa-solid fa-chevron-right"></i></span>
                </form>
            </div>
        </div>
    </div>
    <!-- End Latest News Section -->
    <!-- Start about me -->
    <div class="about-me pb-5 pt-5">
        <div class="con-custom">
            <h6 class="pb-4 pb-4"><a href="developer.php"><?php echo $lang['about-me']['a']?></a><?php echo $lang['about-me']['h6']?></h6>
            <p class="pt-4 text-center"><?php echo $lang['about-me']['p']?><a href="resume.php"><?php echo $lang['about-me']['a-2']?></a>
            </p>
            <div class="profile-img"><img src="admin/front_section/images/thaer.png" alt=""></div>
            <div class="selectors">
                <div class="selector prev"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="selector next"><i class="fa-solid fa-chevron-right"></i></div>
            </div>
            <div class="call-me">
                <i class="fa-brands fa-vk fa-2xl" style="color:#fff"></i>
                <p><?php echo $lang['about-me']['call-me']['p']?><a href="">VK</a><?php echo $lang['about-me']['call-me']['p2']?></p>
                <div class="selectors">
                    <div class="selector prev"><i class="fa-solid fa-chevron-left"></i></div>
                    <div class="selector next"><i class="fa-solid fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End about me -->
    <!-- Start Footer Section -->
    <div class="footer">
        <div class="custom-container">
            <div class="fraction">
                <div class="fra-1 mb-4">
                    <img src="website/front_section/images/1x/Artboard 3.png" alt="Logo">
                    <div>
                        <h5>on-road</h5>
                        <span><?php echo $lang['footer']['span'] ?></span>
                    </div>
                </div>
                <p><?php echo $lang['footer']['p'] ?></p>
                <h6 class="text-light"><?php echo $lang['footer']['h6'] ?></h6>
                <span><?php echo $lang['footer']['span-2'] ?></span>
                <span><?php echo $lang['footer']['span-3'] ?></span>
            </div>
            <div class="fraction">
                <h5><?php echo $lang['footer']['h5'] ?></h5>
                <ul>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> BMW M3/E92</li>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> Mitsubishi/asx</li>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> Mercedes/benz/a/class</li>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> Porsche/718/Boxster</li>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> Volkswagen/Arteon</li>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> Audi/A3/Premium</li>
                    <li><span><i class="fa-solid fa-chevron-right"></i></span> Lamborghini/Huracan</li>
                </ul>
            </div>
            <div class="fraction">
                <h5><?php echo $lang['footer']['h5-2'] ?></h5>
                <div class="latest-news-container mb-4 pb-4" style="border-bottom:1px solid #484848">
                    <span class="d-block"><i class="fa-brands fa-vk fa-xl text-light"></i></span>
                    <div>
                        <p><a href="" style="color:#4C75A3">@thaer</a>, <?php echo $lang['footer']['p-3'] ?></p>
                        <span><?php echo $lang['footer']['span-4'] ?></span>
                    </div>
                </div>
                <div class="latest-news-container">
                    <span class="d-block"><i class="fa-brands fa-vk fa-xl text-light"></i></span>
                    <div>
                        <p><a href="" style="color:#4C75A3">@thaer</a>, <?php echo $lang['footer']['p-4'] ?></p>
                        <span><?php echo $lang['footer']['span-4'] ?></span>
                    </div>
                </div>
            </div>
            <div class="fraction">
                <h5><?php echo $lang['footer']['h5-3'] ?></h5>
                <div class="info mb-3">
                    <i class="fa-solid fa-location-dot fa-lg" style="color:#bbbaba; padding-right:8px;"></i>
                    <span><?php echo $lang['footer']['span-5'] ?></span>
                </div>
                <div class="info mb-3">
                    <i class="fa-solid fa-phone fa-lg" style="color:#bbbaba; padding-right:8px;"></i>
                    <span><?php echo $lang['footer']['span-6'] ?></span>
                </div>
                <div class="info mb-3">
                    <i class="fa-solid fa-fax fa-lg" style="color:#bbbaba; padding-right:8px;"></i>
                    <span><?php echo $lang['footer']['span-7'] ?></span>
                </div>
                <div class="info mb-3">
                    <i class="fa-solid fa-envelope fa-lg" style="color:#bbbaba; padding-right:8px;"></i>
                    <span><?php echo $lang['footer']['span-8'] ?></span>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="custom-container">
                <span>copyright <span class="copy">&copy;On-Road</span> 2024 Made with
                    <i class="fa-solid fa-heart" style="color:red"></i> by Thaer Naem</span>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Vk</li>
                    <li>Pinterest</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Footer Section -->
    <?php include 'website/back_section/html_parts/footer.php';?>