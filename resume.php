<?php   
        include "website/links.php";
        $change = 'En';
        if(isset($_GET['lang'])) {$change = $_GET['lang'] ?? 'En';};
        include "website/back_section/languages/" . $change . ".php";
    ?>
    <!-- Start a navbar for phone -->
    <div class="navbar-phone">
        <div class="custom-container">
            <span id="phone-menu"><i class="fa-solid fa-bars"></i></span>
            <input type="search" name="search" id="">
            <span><a href="members/index.php"><i class="fa-solid fa-user"></i></a></span>
        </div>
        <ul data-menu="closed">
            <li><?php echo $resume['navbar-phone']['li-1'];?></li>
            <li><?php echo $resume['navbar-phone']['li-2'];?></li>
            <li><a href="index.php" style="color:var(--green2-color)">On Road</a></li>
            <li><?php echo $resume['navbar-phone']['li-3'];?></li>
        </ul>
    </div>
    <!-- End a navbar for phone -->
    <div class="resume">
        <div class="custom-container">
            <div class="fraction-1">
                <div class="avatar">
                    <img class="w-100" src="website/front_section/images/resume/admin.png" alt="Admin">
                </div>
                <div class="info-container">
                    <h4><?php echo $resume['resume']['h4-1']?></h4>
                    <ul>
                        <li>
                            <span><?php echo $resume['resume']['span-1']?></span>
                            <span><?php echo $resume['resume']['span-2']?></span>
                        </li>
                        <li>
                            <span><?php echo $resume['resume']['span-3']?></span>
                            <span><?php echo $resume['resume']['span-4']?></span>
                        </li>
                        <li>
                            <span><?php echo $resume['resume']['span-5']?></span>
                            <span style="text-transform:lowercase">
                            <?php echo $resume['resume']['span-6']?></span>
                        </li>
                        <li>
                            <span><?php echo $resume['resume']['span-7']?></span>
                            <span style="text-transform:lowercase">
                            <?php echo $resume['resume']['span-8']?></span>
                        </li>
                    </ul>
                    <h4><?php echo $resume['resume']['h4-2']?></h4>
                    <ul>
                        <li>
                            <span><?php echo $resume['resume']['span-9']?></span>
                            <span><?php echo $resume['resume']['span-10']?></span>
                        </li>
                        <li>
                            <span><?php echo $resume['resume']['span-11']?></span>
                            <span><?php echo $resume['resume']['span-12']?></span>
                        </li>
                        <li>
                            <span><?php echo $resume['resume']['span-13']?></span>
                            <span><?php echo $resume['resume']['span-14']?></span>
                        </li>
                        <li>
                            <span><?php echo $resume['resume']['span-15']?></span>
                            <span><?php echo $resume['resume']['span-16']?></span>
                        </li>
                    </ul>
                    <h4><?php echo $resume['resume']['h4-3']?></h4>
                    <p><?php echo $resume['resume']['p']?></p>
                </div>
            </div>
            <div class="fraction-2">
                <h1><?php echo $resume['resume']['h1-1']?></h1>
                <h1><?php echo $resume['resume']['h1-2']?></h1>
                <h2><?php echo $resume['resume']['h2-1']?></h2>
                <p><?php echo $resume['resume']['p-2']?></p>
                <!-- about me -->
                <div class="title">
                    <span><?php echo $resume['resume']['span-17']?></span>
                    <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down fa-lg"></i></span>
                </div>
                <div class="content">
                    <p class="para">
                        <strong><?php echo $resume['content-1']['str-1']?></strong><br>
                        <strong><?php echo $resume['content-1']['str-2']?></strong><br>
                        <?php echo $resume['content-1']['p-1']?>
                        <span></span>
                        <strong><?php echo $resume['content-1']['str-3']?></strong><br>
                        <?php echo $resume['content-1']['p-2']?>
                    </p>
                </div>
                <!-- about me -->
                <!-- Education -->
                <div class="title">
                <span><?php echo $resume['resume']['span-18']?></span>
                    <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down fa-lg"></i></span>
                </div>
                <div class="content">
                    <p class="para">
                    <strong><?php echo $resume['content-2']['str-1']?></strong><br>
                    <?php echo $resume['content-2']['p-1']?>
                    <span></span>
                    <strong><?php echo $resume['content-2']['str-2']?></strong><br>
                    <?php echo $resume['content-2']['p-2']?>
                    <span></span>
                    <strong><?php echo $resume['content-2']['str-3']?></strong><br>
                    <?php echo $resume['content-2']['p-3']?>
                    </p>
                </div>
                <!-- Education -->
                <!-- Experience -->
                <div class="title">
                <span><?php echo $resume['resume']['span-19']?></span>
                    <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down fa-lg"></i></span>
                </div>
                <div class="content">
                    <p class="para">
                        <strong><?php echo $resume['content-3']['str-1']?></strong><br>
                        <?php echo $resume['content-3']['p-1']?>
                        <span></span>
                        <strong><?php echo $resume['content-3']['str-2']?></strong><br>
                        <?php echo $resume['content-3']['p-2']?>
                        <span></span>
                        <strong><?php echo $resume['content-3']['str-3']?></strong><br>
                        <?php echo $resume['content-3']['p-3']?>
                    </p>
                </div>
                <!-- Experience -->
                <!-- Languages -->
                <div class="title">
                <span><?php echo $resume['resume']['span-20']?></span>
                    <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down fa-lg"></i></span>
                </div>
                <div class="content">
                    <p class="para">
                    <?php echo $resume['content-4']['p-1']?>
                    <strong><?php echo $resume['content-4']['str-1']?></strong><br>
                    <span class="progress p-1"></span>
                    <?php echo $resume['content-4']['p-2']?>
                    <strong><?php echo $resume['content-4']['str-2']?></strong>
                    <span class="progress p-2"></span>
                    <?php echo $resume['content-4']['p-3']?>
                    <strong><?php echo $resume['content-4']['str-3']?></strong>
                    <span class="progress p-3"></span>
                    </p>
                </div>
                <!-- Languages -->
                <!-- Certifications -->
                <div class="title">
                <span><?php echo $resume['resume']['span-21']?></span>
                    <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down fa-lg"></i></span>
                </div>
                <div class="content">
                    <p class="para">
                    <strong><?php echo $resume['content-5']['str-1']?></strong><br>
                    <strong><?php echo $resume['content-5']['str-2']?></strong><br>
                    <?php echo $resume['content-4']['p-1']?>
                    <span></span>
                    <strong><?php echo $resume['content-5']['str-3']?></strong><br>
                    <strong><?php echo $resume['content-5']['str-4']?></strong><br>
                    <?php echo $resume['content-4']['p-2']?>
                    <span></span>
                    <strong><?php echo $resume['content-5']['str-5']?></strong><br>
                    <strong><?php echo $resume['content-5']['str-6']?></strong><br>
                    <?php echo $resume['content-4']['p-3']?>
                    <span></span>
                    <strong><?php echo $resume['content-5']['str-7']?></strong><br>
                    <strong><?php echo $resume['content-5']['str-8']?></strong><br>
                    <strong><?php echo $resume['content-5']['str-9']?></strong><br>
                    <?php echo $resume['content-5']['p-4']?>
                    <span></span>
                    <strong><?php echo $resume['content-5']['str-10']?></strong><br>
                    <?php echo $resume['content-5']['p-5']?>
                    <span></span>
                    <strong><?php echo $resume['content-5']['str-11']?></strong><br>
                    <?php echo $resume['content-5']['p-6']?>
                    </p>
                </div>
                <!-- Certifications -->
            </div>
        </div>
    </div>
    <script src="website/front_section/js/resume.js"></script>