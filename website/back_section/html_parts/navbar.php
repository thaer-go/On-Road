<?php
    $change = 'En';
    if(isset($_GET['lang'])) {$change = $_GET['lang'] ?? 'En';};
    include "website/back_section/languages/" . $change . ".php";
?>
<nav class="custom-nav">
    <div class="custom-container">
            <ul class="">
                <li class="nav-item">
                    <a href="index.php"><?php echo $lang['navbar']['li-1']?></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?#categories"><?php echo $lang['navbar']['li-2']?></a>
                </li>
                <li class="nav-item">
                    <a href="Categories.php?page=manage"><?php echo $lang['navbar']['li-3']?></a>
                </li>
                <li class="image">
                    <a class="navbar-brand text-light text-center ms-4" href="../index.php">
                        <img src="website/front_section/images/1x/Artboard 3.png" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="resume.php"><?php echo $lang['navbar']['li-4']?></a>
                </li>
                <li class="nav-item">
                    <a href="Cars.php?page=manage"><?php echo $lang['navbar']['li-5']?></a>
                </li>
                <li class="nav-item">
                    <a href="members/signin.php"><?php echo $lang['navbar']['li-6']?></a>
                </li>
                <li class="nav-item langs">
                    <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down"></i></span>
                    <a class="active"><?php echo $change?></a>
                    <a href="?lang=En">En</a>
                    <a href="?lang=Ru">Ru</a>
                </li>
            </ul>
    </div>
    <div class="fill-width">
        <span class="filled-span"></span>
    </div>
</nav>
<script src="../front_section/js/website.js"></script>


