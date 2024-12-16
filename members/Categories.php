<?php

    // creating an output buffer
    ob_start();

    // calling variables Globally
    session_start();

    // passing only through a session storeged in cookies & server
    if(isset($_SESSION['name'])):

        // Title of this page
        $pageTitle = 'Categories';
        
        // including php files [𝘏𝘛𝘔𝘓 𝘩𝘦𝘢𝘥𝘦𝘳 & 𝘰𝘵𝘩𝘦𝘳𝘴] to run correctly
        include 'links.php';

        $page = isset($_GET['page']) ? $_GET['page'] : 'manage' ;

        // start if condition of pages;
        if ($page == 'manage') :

            // Header of This Page
            echo "<div class='container text-light'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Car Categories</h1>";
            echo "</div>";
                
            // check if there are approved categories
            $check = getAllFrom('*', 'categories', "WHERE category_approve = 1", c:"check");
            if ($check > 0) :

                // Calling data from Database through php & Mysql scripts
                $cats = getAllFrom('*', 'categories', "WHERE category_approve = 1");?>

                        <!-- add All Categories in platform -->
                        <div class="container-fluid mt-4 categories">
                            <div class="row">
                                <!-- cards of categories -->
                                <!-- Fetching data[approved categories] from database -->
                                <?php foreach($cats as $cat):?>
                                    <div class="col-md-4 col-lg-3">
                                        <div class="card fix-height" style="width: 18rem;">
                                            <img src="../admin/front_section/images/categories/<?php echo $cat['category_image']?>" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $cat['category_name']?></h5>
                                                <p class="card-text"><?php echo $cat['category_description']?></p>
                                                <a class="btn btn-primary" href="categories.php?page=classification&cat_id=<?php echo $cat['category_id']?>">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
            <?php // if there are no fields in this table
            else:
                echo "<div class='container'>";
                    echo "<div class='alert alert-danger'>Sorry, There Are No Categories To Show</div>";
                    // Adding New Cateogry
                    echo "<a href='?page=add' class='btn btn-success'> New Category";
                        echo "<i class='fa-solid fa-plus' style='color: #fff'></i>";
                    echo "</a>";
                echo "</div>";
            endif; 
            
        // if cindition 'classification'
        elseif ($page == 'classification') :

            // start if condition for pages
            // $id = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? intval($_GET['cat_id']) :0;
            if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) :

                // fetching data from database
                $cars = getAllFrom('*', 'cars', "WHERE car_approve = 1", "AND category_id =".$_GET['cat_id'], "ORDER BY car_id ASC", '');
                
                // loop on data fetched from database
                foreach($cars as $car):
                ?>
                <!-- Header of This Page -->
                <div class='container text-light'>
                    <h1 class='text-muted text-center pt-4 pb-4'>Classification</h1>
                </div>
                <!-- add All Cars in platform -->
                <div class="container-fluid mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../admin/front_section/images/cars/<?php echo $car['car_image']?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $car['car_name']?></h5>
                            <p class="card-text"><?php echo $car['car_description']?></p>
                            <a class="btn btn-primary" href="cars.php?car_id=<?php echo $car['car_id']?>">See More</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;

            // if condition numeric id 
            endif;
        // end if condition of pages;
        endif;

        // including php files [𝘏𝘛𝘔𝘓 𝘧𝘰𝘰𝘵𝘦𝘳 & 𝘑𝘚 𝘓𝘪𝘣𝘳𝘢𝘳𝘪𝘦𝘴] to run correctly
        include 'back_section/html_parts/footer.php';

        // end of checing session exisitance
    endif;

    // Ending output buffer
    ob_end_flush();

