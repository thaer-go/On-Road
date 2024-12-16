<?php

    // creating an output buffer
    ob_start();

    // calling variables Globally
    session_start();

    // passing only through a session storeged in cookies & server
    if(isset($_SESSION['name'])):

        // Title of this page
        $pageTitle = 'Car Details';
        
        // including php files [𝘏𝘛𝘔𝘓 𝘩𝘦𝘢𝘥𝘦𝘳 & 𝘰𝘵𝘩𝘦𝘳𝘴] to run correctly
        include 'links.php';
        
        // page name
        echo "<div class='container'>";
            echo "<h1 class='text-muted text-center mt-4 mb-4'>Car Detials</h1>";
        echo "</div>";
        
        // check if user id is a numeric value
        $check_id = isset($_GET['car_id']) && is_numeric($_GET['car_id']) ? intval($_GET['car_id']) :0;

        // Check if this id is existed
        $val = checkUsers('car_id', 'cars', $check_id);
        if ($val > 0):

            // Calling data from Database through php & Mysql scripts [join columns from other tables]
            $cars = $from_data->prepare("SELECT 
                                            cars.*,
                                            users.user_name,
                                            categories.category_name
                                        FROM 
                                            cars
                                        INNER JOIN
                                            users
                                        ON
                                            users.user_id = cars.member_id
                                        INNER JOIN
                                            categories
                                        ON
                                            categories.category_id = cars.category_id
                                        WHERE
                                            cars.car_id = ?
                                        AND
                                            car_approve = 1
                                        ORDER BY
                                            car_id DESC");
            // executing MYSQL query
            $cars->execute(array($check_id));

            // Checking if there are fields in this table
            $c = $cars->rowCount();

            if ($c > 0) :

            // fetching data from database
            $car = $cars->fetch();?>
                <!-- Starting HTML -->
                <!-- showing fields chosen in a table created by [𝘉𝘰𝘰𝘵𝘴𝘵𝘳𝘢𝘱 𝘷5.1] -->
                <div class="container">
                    <div class="row car-detials">
                        <div class="col-lg-4">
                            <img src="../admin/front_section/images/cars/<?php echo $car['car_image']?>" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-8">
                        <div class="table-recaronsive text-white">
                            <table class="table table-striped table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Number</th>
                                        <th scope="col" class=""><?php echo $car['car_name']?></th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope='row'>Description</th>
                                        <td><?php echo $car['car_description']?></td>
                                    <tr>
                                    <tr>
                                        <th scope='row'>Price</th>
                                        <td><?php echo $car['car_price']?></td>
                                    <tr>
                                    <tr>
                                        <th scope='row'>Posted</th>
                                        <td><?php echo $car['car_date']?></td>
                                    <tr>
                                    <tr>
                                        <th scope='row'>Category</th>
                                        <td>
                                            <a style="color:var(--red-color)" href="categories.php?page=classification&cat_id=<?php echo $car['category_id']?>"><?php echo $car['category_name']?></a>
                                        </td>
                                    <tr>
                                    <tr>
                                        <th scope='row'>Posted By</th>
                                        <td>
                                            <a style="color:var(--red-color)" href="users.php?user_id=<?php echo $car['member_id']?>"><?php echo $car['user_name']?></a>
                                        </td>
                                    <tr>
                                    <tr>
                                        <th scope='row'>Tags</th>
                                        <td>
                                            <?php
                                            $tags = explode(',', $car['car_tags']);
                                            foreach($tags as $tag):
                                                $space = str_replace(' ', '', $tag);
                                                $lower = strtolower($space);
                                                echo "<a style='color:var(--red-color)' href='tags.php?tag={$lower}'>[ ". $space ." ]</a> ";
                                            endforeach;
                                            ?>
                                        </td>
                                    <tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        else:
            $msg = 'Sorry, This Car is Not On Platform';
            redirectPage($msg);
        endif;

    // including php files [𝘏𝘛𝘔𝘓 𝘧𝘰𝘰𝘵𝘦𝘳 & 𝘑𝘚 𝘓𝘪𝘣𝘳𝘢𝘳𝘪𝘦𝘴] to run correctly
    include 'back_section/html_parts/footer.php';

    // redirect to home page
    else:
        // redirect using header
        header("Location: index.php");
        exit();
    
    // end of checing session exisitance
    endif;

    // Ending output buffer
    ob_end_flush();

