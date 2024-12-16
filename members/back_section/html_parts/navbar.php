<?php
    $change = 'En';
    if(isset($_GET['lang'])) {$change = $_GET['lang'] ?? 'En';};
    include "back_section/languages/" . $change . ".php";
?>
<div class="custom-navbar">
        <div class="custom-container">
            <div class="image">
                <img src="front_section/images/logo.png" alt="logo">
            </div>
            <ul class="main-menu">
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
            </ul>
            <ul class="second-menu">
                <li>reports</li>
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
                    <span class="menu-option logOut"><a href="logout.php"><?php echo $profile['navbar-phone']['span-10']?></a></span>
                </li>
            </ul>
            <div class="exit">
                <i class="fa-solid fa-power-off"></i>
                <span class="menu-option logOut"><a href="logout.php"><?php echo $profile['navbar-phone']['span-10']?></a></span>
            </div>
        </div>
    </div>
    <script src="members/front_section/js/profile.js"></script>