<?php

    // creating an output buffer
    ob_start();

    // calling variables Globally
    session_start();

    // passing only through a session storeged in cookies & server
    if(isset($_SESSION['name'])):

        // Title of this page
        $pageTitle = 'Cars';
        
        // including php files [𝘏𝘛𝘔𝘓 𝘩𝘦𝘢𝘥𝘦𝘳 & 𝘰𝘵𝘩𝘦𝘳𝘴] to run correctly
        include 'links.php';
        
        // Creating Internal php pages
        // checking the name of this internal page
        isset($_GET['page']) ? $_GET['page'] : 'manage' ;

        // Checking Name of internal page
        if ($_GET['page'] == 'manage'):

            // Header of This Page
            echo "<div class='container text-light'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Cars Page</h1>";
            echo "</div>";

            // Calling data from Database through php & Mysql scripts [join columns from other tables]
            $car = $from_data->prepare("SELECT * FROM cars");
            // executing MYSQL query
            $car->execute();

            // fetching data from database
            $fcar = $car->fetchAll();

            // Checking if there are fields in this table
            $check = $car->rowCount();
            echo "<pre>";
                echo print_r($fcar);
            echo "</pre>";
            if ($check > 0) :?>
                <!-- Starting HTML -->
                <!-- showing fields chosen in a table created by [𝘉𝘰𝘰𝘵𝘴𝘵𝘳𝘢𝘱 𝘷5.1] -->
                <div class="container">
                    <div class="table-responsive text-white">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Number</th>
                                    <th scope="col" class="">Car</th>
                                    <th scope="col" class="w-50">Car Description</th>
                                    <th scope="col" class="" style="width:10%">Car Price</th>
                                    <th scope="col" class="" style="width:15%">Date</th>
                                    <th scope="col" class="">Category</th>
                                    <th scope="col" class="">Name</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fcar as $sp): ?>
                                <tr>
                                    <th scope='row' class='text-center'><?php echo $sp['car_id']?></th>
                                    <td><?php echo $sp['car_name']?></td>
                                    <td><?php echo $sp['car_description']?></td>
                                    <td><?php echo $sp['car_price']?></td>
                                    <td><?php echo $sp['car_date']?></td>
                                    <td><?php echo $sp['category_name']?></td>
                                    <td><?php echo $sp['user_name']?></td>
                                    <td class="text-center" style="min-width:130px">
                                        <div class="d-flex justify-content-evenly">
                                        <a class="del to-edit text-center" href="cars.php?page=delete&category_id=<?php echo $sp['car_id']?>">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                        </a>
                                        <a class="to-edit text-center" href="cars.php?page=edit&category_id=<?php echo $sp['car_id']?>">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Adding New Cateogry -->
                    <a href="?page=add" class="btn btn-success"> New Car
                        <i class="fa-solid fa-plus" style="color: #fff"></i>
                    </a>
                </div>
            <?php
            // if there are no fields in this table
            else:

                echo "<div class='container'>";
                    echo "<div class='alert alert-danger'>Sorry, There Are No Categories To Show</div>";
                    // Adding New Cateogry
                    echo "<a href='?page=add' class='btn btn-success'> New Category";
                        echo "<i class='fa-solid fa-plus' style='color: #fff'></i>";
                    echo "</a>";
                echo "</div>";
            endif;
        endif;
    // including php files [𝘏𝘛𝘔𝘓 𝘧𝘰𝘰𝘵𝘦𝘳 & 𝘑𝘚 𝘓𝘪𝘣𝘳𝘢𝘳𝘪𝘦𝘴] to run correctly
    include 'back_section/html_parts/footer.php';

    // end of checing session exisitance
endif;

// Ending output buffer
ob_end_flush();