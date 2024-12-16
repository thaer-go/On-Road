<?php

    ob_start();
    session_start();
    $pageTitle = 'Dashboard';

    if (isset($_SESSION['Username'])) {
        include 'links.php';
        $change = 'En';
        if(isset($_GET['lang'])) {$change = $_GET['lang'] ?? 'En';};
        include "back_section/languages/" . $change . ".php";
        $profilePic = getData('Avatar', 'users', 'Username', $_SESSION['Username']);
        $profileName = getData('Name', 'users', 'Username', $_SESSION['Username']);
    ?>
    <!-- Start Loading page -->
    <div class="loading">
        <div class="custom-container">
            <div class="image">
                <img src="front_section/images/1x/Artboard 3.png" alt="logo">
            </div>
            <div class="heading sign-in">
                <h1>Welcome <?php echo $profileName?></h1>
                <h4>We are Uploading Files</h4>
                <h4>Please Wait
                    <span><i class="fa-solid fa-circle"></i></span>
                    <span><i class="fa-solid fa-circle"></i></span>
                    <span><i class="fa-solid fa-circle"></i></span>
                </h4>
            </div>
        </div>
    </div>
    <!-- End Loading page -->
    <!-- Start a navbar for phone -->
    <div class="navbar-phone">
        <div class="custom-container">
            <span id="phone-menu"><i class="fa-solid fa-bars"></i></span>
            <input type="search" name="search" id="">
            <span><a href="members/index.php"><i class="fa-solid fa-user"></i></a></span>
        </div>
        <ul data-menu="closed">
            <li class="active-section">
                <i class="fa-solid fa-grip"></i>
                <span class="menu-option"><a href="dashboard.php"><?php echo $profile['navbar-phone']['span-1']?></a></span>
            </li>
            <li>
                <i class="fa-brands fa-steam-symbol"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-2']?></span>
            </li>
            <li>
                <i class="fa-solid fa-car"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-3']?></span>
            </li>
            <li>
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-4']?></span>
            </li>
            <li>
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-5']?></span>
            </li>
            <li>
                <i class="fa-solid fa-bell-concierge"></i   >
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-6']?></span>
            </li>
            <li>
                <i class="fa-regular fa-credit-card"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-7']?></span>
            </li>
            <li>
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-8']?></span>
            </li>
            <li>
                <i class="fa-regular fa-rectangle-list"></i>
                <span class="menu-option"><?php echo $profile['navbar-phone']['span-9']?></span>
            </li>
            <li>
                <i class="fa-solid fa-power-off"></i>
                <span class="menu-option"><a href="logout.php"><?php echo $profile['navbar-phone']['span-10']?></a></span>
            </li> 
        </ul>
    </div>
    <!-- End a navbar for phone -->

    <!-- Start Dashboard -->
    <div class="section">
        <div class="custom-container">
            <div class="block block-1">
                <div class="message">
                    <h3><?php echo $profile['block-1']['h3-1']?>, <?php echo getData('Name', 'users', 'Username',$_SESSION['Username'])?></h3>
                    <h6><?php echo $profile['block-1']['h6-1']?></h6>
                </div>
                <input type="search" name="search" id="" placeholder="<?php echo $profile['block-1']['ph']?>">
                <ul>
                    <li class="nav-item langs">
                        <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down"></i></span>
                        <a class="active"><?php echo $change?></a>
                        <a href="?lang=En">En</a>
                        <a href="?lang=Ru">Ru</a>
                    </li>
                    <li class="icon icon-1"><i class="fa-regular fa-comment"></i></li>
                    <li class="icon icon-2"><i class="fa-regular fa-bell"></i></li>
                    <li class="icon icon-3">
                        <img src="front_section/avatars/<?php echo !empty($profilePic) ? $profilePic : 'default picture.jpg' ?>" class="w-100" alt="">
                    </li>
                </ul>
            </div>
            <div class="block block-2">

                <div class="info">
                    <div class="image" style="background-color:var(--red-color)">
                    <i class="fa-solid fa-users-line fa-xl"></i>
                    </div>
                    <div class="detials">
                        <span><?php echo $profile['block-2']['span-1']?></span>
                        <span style="margin-top:-5px"><a href="members.php?page=manage"><?php echo $profile['block-2']['span-2']?></a></span>
                        <span><?php echo countElements('Username', 'users')?></span>
                    </div>
                </div>
                </a>
                <div class="info">
                    <div class="image" style="background-color:var(--yellow-color)">
                    <i class="fa-solid fa-qrcode fa-xl"></i>
                    </div>
                    <div class="detials">
                        <span><?php echo $profile['block-2']['span-3']?></span>
                        <span style="margin-top:-5px"><a href="categories.php?page=manage"><?php echo $profile['block-2']['span-4']?></a></span>
                        <!-- PHP CODE -->
                        <span>0</span>
                    </div>
                </div>
                <div class="info">
                    <div class="image" style="background-color:var(--green-color)">
                    <i class="fa-solid fa-car fa-xl"></i>   
                    </div>
                    <div class="detials">
                        <span><?php echo $profile['block-2']['span-5']?></span>
                        <span style="margin-top:-5px"><a href="cars.php?page=manage"><?php echo $profile['block-2']['span-6']?></a></span>
                        <!-- PHP CODE -->
                        <span>0</span>
                    </div>
                </div>
                <div class="info">
                    <div class="image" style="background-color:var(--dark-grey)">
                    <i class="fa-solid fa-comments fa-xl"></i>
                    </div>
                    <div class="detials">
                        <span><?php echo $profile['block-2']['span-7']?></span>
                        <span style="margin-top:-5px"><a href="comments.php?page=manage"><?php echo $profile['block-2']['span-8']?></a></span>
                        <!-- PHP CODE -->
                        <span>0</span>
                    </div>
                </div>
            </div>
            <div class="block block-3">
                <div class="car">
                    <div class="offer">
                        <div class="name">
                            <div class="image">
                                <img src="../admin/front_section/images/nissan-logo.png" alt="Nissan">
                            </div>
                            <div class="car-name">
                                <h5>Nissan GTR</h5>
                                <h6>Evoque</h6>
                            </div>
                        </div>
                        <div class="car-image">
                            <img src="../admin/front_section/images/cars/nissan.png" alt="car">
                        </div>
                        <div class="price">
                            <span><?php echo $profile['block-3']['span-1']?><span>
                            <h4>$ 38.700 usd</h4>
                        </div>
                    </div>
                    <div class="chars">
                        <div class="char char-1">
                            <span style="background-color:var(--red-color)"><i class="fa-solid fa-bolt"></i></span>
                            <span>1997 CC</span>
                        </div>
                        <div class="char char-2">
                            <span style="background-color:var(--yellow-color)"><i class="fa-solid fa-arrows-up-down"></i></span>
                            <span>246</span>
                        </div>
                        <div class="char char-3">
                            <span style="background-color:var(--green-color)"><i class="fa-solid fa-droplet"></i></span>
                            <span>6 speed</span>
                        </div>
                        <div class="char char-4">
                            <span style="background-color:var(--dark-grey)"><i class="fa-solid fa-copyright"></i></span>
                            <span>4 cylinders</span>
                        </div>
                        <div class="char char-5">
                            <span style="background-color:var(--green-color)"><i class="fa-solid fa-bolt"></i></span>
                            <span><?php echo $profile['block-3']['span-2']?></span>
                            <span> 9.425 km</span>
                        </div>
                    </div>
                </div>
                <!-- JS CODE -->
                <div class="calender">
                    <h4>August, 2024</h4>
                    <div class="wm">
                        <span>week</span>
                        <span>month</span>
                    </div>
                    <div class="month">
                        <span>mon</span>
                        <span>tue</span>
                        <span>wed</span>
                        <span>thru</span>
                        <span>fri</span>
                        <span>sat</span>
                        <span>sun</span>
                    </div>
                    <div class="days"></div>
                </div>
            </div>
            <div class="block block-4">
                <div class="status"><?php echo $profile['block-4']['div-1']?></div>
                <div class="history"><?php echo $profile['block-4']['div-2']?></div>
            </div>
        </div>
    </div>
    <!-- End Dashboard -->

    <?php include 'back_section/html_parts/footer.php';
    } else {
        header('Location: ../members/index.php');
        exit();
    }

    ob_end_flush();
