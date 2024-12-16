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
            $car = $from_data->prepare("SELECT 
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
                                        ORDER BY
                                            car_id DESC");
            // executing MYSQL query
            $car->execute();

            // fetching data from database
            $fcar = $car->fetchAll();

            // Checking if there are fields in this table
            $check = $car->rowCount();

            if (! empty($fcar)) :?>
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
                                    <td>$ <?php echo $sp['car_price']?></td>
                                    <td><?php echo $sp['car_date']?></td>
                                    <td><?php echo $sp['category_name']?></td>
                                    <td><?php echo $sp['user_name']?></td>
                                    <td class="text-center" style="min-width:130px">
                                        <div class="d-flex justify-content-evenly">
                                        <a class="del to-edit text-center confirm" href="cars.php?page=delete&car_id=<?php echo $sp['car_id']?>">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                        </a>
                                        <a class="to-edit text-center" href="cars.php?page=edit&car_id=<?php echo $sp['car_id']?>">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                        <?php if($sp['car_approve'] == 0):?>
                                        <a class="to-edit text-center" href="cars.php?page=approve&car_id=<?php echo $sp['car_id']?>">
                                            <span><i class="fa-solid fa-thumbs-up"></i></span>
                                        </a>
                                        <?php endif;?>
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
        elseif($_GET['page'] == 'add'):
            
            // Header of This Page
            echo "<div class='container mt-4 mb-4'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Add A New Car</h1>";
            echo "</div>";?>

            <!-- Form to inserting new category -->
            <div class="container w-50">
                <form action="?page=insert" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input  type="text" 
                                name="car-name" 
                                class="form-control" 
                                id="floatingInput" 
                                placeholder="example: Sedan" 
                                autpcomplete="off">
                        <label for="floatingInput">Car Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea   class="form-control" 
                                    name="car-description"
                                    placeholder="Leave a comment here" 
                                    id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Car Description</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input  type="text" 
                            class="form-control" 
                            name="car-price" 
                            id="floatingInput" 
                            placeholder="example: Sedan" 
                            autpcomplete="off">
                        <label for="floatingTextarea">Car Price</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input  type="text" 
                            class="form-control" 
                            name="country" 
                            id="floatingInput" 
                            placeholder="example: Sedan" 
                            autpcomplete="off">
                        <label for="floatingTextarea">Country Made</label>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="floatingTextarea">Car Model :</label>
                        <select id="selecting" 
                                class="select form-select" 
                                name="model-selected" 
                                aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="0">Model 2024</option>
                            <option value="1">Model 2022</option>
                            <option value="2">Model 2020</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Choose Car Image</label>
                        <input  type="file"
                                name="img-file"
                                class="form-control form-control-sm" 
                                id="formFileSm" >
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="floatingTextarea">Added By :</label>
                        <select id="selecting" 
                                class="select form-select" 
                                name="member" 
                                aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php $addBy = $from_data->prepare("SELECT * FROM users");
                            $addBy->execute();
                            $us = $addBy->fetchAll();
                            foreach($us as $u):?>
                                <option value="<?php echo $u['user_id']?>"><?php echo $u['user_name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="floatingTextarea">Category :</label>
                        <select id="selecting" 
                                class="select form-select" 
                                name="category" 
                                aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php $addBy = $from_data->prepare("SELECT * FROM categories");
                            $addBy->execute();
                            $cs = $addBy->fetchAll();
                            foreach($cs as $c):?>
                                <option value="<?php echo $c['category_id']?>"><?php echo $c['category_name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                    <input  type="text" 
                            class="form-control" 
                            name="tags" 
                            id="floatingInput" 
                            placeholder="Saparate Your Tags With (,)" 
                            autpcomplete="off">
                        <label for="floatingTextarea">Saparate Your Tags With (,)</label>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Confirm Information</button>
                    </div>
                </form>
            </div>
        <?php
        // insert an internal page
        elseif($_GET['page'] == 'insert'):

            // Check if request of entering this page is from a form
            if ($_SERVER['REQUEST_METHOD'] == 'POST'):

                // Header of This Page
                echo "<div class='container mt-4 mb-4'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Insert Page</h1>";
                echo "</div>";
                
                // Dealing with information recieved from form
                $car_name           = $_POST['car-name'];
                $car_desc           = $_POST['car-description'];
                $car_price          = $_POST['car-price'];
                $country            = $_POST['country'];
                $model_selected     = $_POST['model-selected'];
                $member             = $_POST['member'];
                $category           = $_POST['category'];
                $car_tags           = $_POST['tags'];

                // Creating variables for uploaded files from Form od 𝘢𝘥𝘥 page
                $img_name   = $_FILES['img-file']['name'];
                $img_type   = $_FILES['img-file']['type'];
                $img_tmp    = $_FILES['img-file']['tmp_name'];
                $img_size   = $_FILES['img-file']['size'];
                
                // allowed file extention to upload
                $allowedFileExtention = array('jpg', 'jpeg', 'png', 'gif');

                // getting uploaded file extention
                $toArray = explode('.', $img_name);
                $extentionAllowed = strtolower(end($toArray));
                
                // Handling Errors From Server Side Using php
                $handleErrors = array();
                
                // checking if uploaded file extention is allowed
                if(! empty($img_name) && ! in_array($extentionAllowed, $allowedFileExtention)) {
                    $handleErrors[] = "This File Extention is Not Allowed";
                };
                if($img_size > 4194304) {
                    $handleErrors[] = "This File Size is Bigger Than 4MB";
                };

                // Sending Database Correct Form of Data Inserted
                if (empty($handleErrors)):

                    // adding number to uploaded file to aviod frequency
                    $imgSending = rand(0, 10000) . '_' . $img_name;

                    // move file uploaded from localstorage to project file
                    move_uploaded_file($img_tmp, "front_section/images/cars/" . $imgSending); // adjust image domin

                    // check if category name is existed in database
                    $chCat = checkUsers('car_name', 'cars', $car_name);
                    if ($chCat > 0):

                        // Not Allowed to Insert This Name
                        $msg = 'Sorry, Car <strong>(' . $car_name . ')</strong> Has Been Already Inserted';
                        redirectPage($msg, time:3);
                    else:
                
                        // Allowed to Insert This Name
                        // inserting information into database
                        $insert_car = $from_data->prepare(" INSERT INTO 
                        cars(car_name, car_description, car_price, car_date, car_country, car_image, car_status, category_id, member_id, car_tags)
                                                            VALUES
                        (:zcar_name, :zcar_desc, :zcar_price, NOW(), :zcountry, :zcarimg, :zmodel_selected, :zcategory, :zmember, :zcar_tags)");

                        // executing MYSQL query
                        $insert_car->execute(array(
                            'zcar_name'         => $car_name,
                            'zcar_desc'         => $car_desc,
                            'zcar_price'        => $car_price,
                            'zcountry'          => $country,
                            'zcarimg'           => $imgSending,
                            'zmodel_selected'   => $model_selected,
                            'zcategory'         => $category,
                            'zmember'           => $member,
                            'zcar_tags'         => $car_tags
                        ));

                        // Successful inserting
                        $msg = 'Category Has Been Inserted Successfully';
                        redirectpage($msg, 'success', 'cars.php?page=manage');
                    endif;
                else:

                    // outputing Errors appeared
                    foreach($handleErrors as $error):
                        echo "<div class='container mt-4'>";
                        echo "<div class='alert alert-danger'>" . $error . "</div>";
                        echo "</div>";
                    endforeach;

                    // Redirect Message
                    $reMsg = "Please, check your information again";
                    redirectPage($reMsg);

                endif;
            else:
                
                echo "<div class='container mt-4'>";
                    echo "<div class='alert alert-danger'>Sorry, You Are Not Allowed To Enter This Page <strong>Directly</strong></div>";
                echo "</div>";
                
            // end checking form request
            endif;
        elseif ($_GET['page'] == 'edit'):
            
            // check if value if id is numeric
            $car_id = isset($_GET['car_id']) && is_numeric($_GET['car_id']) ? intval($_GET['car_id']) :0;

            // check if category id is existed in database
            $checkCar_id = checkUsers('car_id', 'cars', $car_id);
            if($checkCar_id > 0):
            
                // fetching category information from database
                $fetchCar = $from_data->prepare("SELECT * FROM cars WHERE car_id = ?");

                // binding values
                $fetchCar->execute(array($car_id));

                // fetch information
                $fetchInfo = $fetchCar->fetch();

                // Header of This Page
                echo "<div class='container mt-4 mb-4'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Edit Car</h1>";
                echo "</div>";?>

                <!-- Form to inserting new category -->
                <div class="container w-50 mb-4">
                    <form action="?page=update" method="POST" enctype="multipart/form-data">
                        <input  type="hidden" 
                                name="car-id" 
                                value="<?php echo $car_id?>">
                        <div class="form-floating mb-3">
                            <input  type="text" 
                                    name="car-name" 
                                    value="<?php echo $fetchInfo['car_name']?>" 
                                    class="form-control" id="floatingInput" 
                                    placeholder="example: Sedan" 
                                    autpcomplete="off">
                            <label for="floatingInput">Car Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea   class="form-control" 
                                        name="car-description"
                                        placeholder="Leave a comment here" 
                                        id="floatingTextarea"><?php echo $fetchInfo['car_description']?></textarea>
                            <label for="floatingTextarea">Car Description</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input  type="text" 
                                class="form-control"
                                value="<?php echo $fetchInfo['car_price']?>" 
                                name="car-price" 
                                id="floatingInput" 
                                placeholder="example: Sedan" 
                                autpcomplete="off">
                            <label for="floatingTextarea">Car Price</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input  type="text" 
                                class="form-control"
                                value="<?php echo $fetchInfo['car_country']?>" 
                                name="country" 
                                id="floatingInput" 
                                placeholder="example: Sedan" 
                                autpcomplete="off">
                            <label for="floatingTextarea">Country Made</label>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="floatingTextarea">Car Model :</label>
                            <select id="selecting" 
                                    class="select form-select" 
                                    name="model-selected" 
                                    aria-label="Default select example">
                                <?php $cs = $from_data->prepare("SELECT * FROM cars WHERE car_id = $car_id");
                                $cs->execute();
                                $sts = $cs->fetch();?>
                                <option value="0" <?php if($sts['car_status']  == 0) {echo 'selected';}?>>Model 2024</option>
                                <option value="1" <?php if($sts['car_status']  == 1) {echo 'selected';}?>>Model 2022</option>
                                <option value="2" <?php if($sts['car_status']  == 2) {echo 'selected';}?>>Model 2020</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Choose Car Image</label>
                            <input  type="file"
                                    name="img-file"
                                    class="form-control form-control-sm" 
                                    id="formFileSm" >
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="floatingTextarea">Added By :</label>
                            <select id="selecting" 
                                    class="select form-select" 
                                    name="member" 
                                    aria-label="Default select example">
                                <?php $addBy = $from_data->prepare("SELECT * FROM users");
                                $addBy->execute();
                                $us = $addBy->fetchAll();
                                foreach($us as $u):?>
                                    <option value="<?php echo $u['user_id']?>" 
                                        <?php if($u['user_id'] == $fetchInfo['member_id']){echo 'selected';} ?>>
                                        <?php echo $u['user_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="floatingTextarea">Category :</label>
                            <select id="selecting" 
                                    class="select form-select" 
                                    name="category" 
                                    aria-label="Default select example">
                                <?php $addBy = $from_data->prepare("SELECT * FROM categories");
                                $addBy->execute();
                                $cs = $addBy->fetchAll();
                                foreach($cs as $c):?>
                                    <option value="<?php echo $c['category_id']?>"
                                        <?php if($c['category_id'] == $fetchInfo['category_id']){echo 'selected';}?>>
                                        <?php echo $c['category_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                        <input  type="text" 
                                class="form-control"
                                value="<?php echo $fetchInfo['car_tags']?>"
                                name="tags" 
                                id="floatingInput" 
                                placeholder="Saparate Your Tags With (,)" 
                                autpcomplete="off">
                            <label for="floatingTextarea">Saparate Your Tags With (,)</label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Confirm Information</button>
                        </div>
                    </form>
                </div>
            <?php
            else:
                
                // this ID is not existed
                $msg = 'This Car is Not existed Anymore';
                redirectPage($msg);
                
            endif;
        elseif ($_GET['page'] == 'update'):

            // Check if request of entering this page is from a form
            if ($_SERVER['REQUEST_METHOD'] == 'POST'):

                // Header of This Page
                echo "<div class='container mt-4 mb-4'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Update Car</h1>";
                echo "</div>";
                
                // Dealing with information recieved from form
                $car_id             = $_POST['car-id'];
                $car_name           = $_POST['car-name'];
                $car_desc           = $_POST['car-description'];
                $car_price          = $_POST['car-price'];
                $country            = $_POST['country'];
                $model_selected     = $_POST['model-selected'];
                $member             = $_POST['member'];
                $category           = $_POST['category'];
                $car_tags           = $_POST['tags'];

                // Creating variables for uploaded files from Form od 𝘢𝘥𝘥 page
                $img_name   = $_FILES['img-file']['name'];
                $img_type   = $_FILES['img-file']['type'];
                $img_tmp    = $_FILES['img-file']['tmp_name'];
                $img_size   = $_FILES['img-file']['size'];
                
                // allowed file extention to upload
                $allowedFileExtention = array('jpg', 'jpeg', 'png', 'gif');

                // getting uploaded file extention
                $toArray = explode('.', $img_name);
                $extentionAllowed = strtolower(end($toArray));
                
                // Handling Errors From Server Side Using php
                $handleErrors = array();
                
                // checking if uploaded file extention is allowed
                if(! empty($img_name) && ! in_array($extentionAllowed, $allowedFileExtention)) {
                    $handleErrors[] = "This File Extention is Not Allowed";
                };
                if($img_size > 4194304) {
                    $handleErrors[] = "This File Size is Bigger Than 4MB";
                };

                // Sending Database Correct Form of Data Inserted
                if (empty($handleErrors)):

                    // adding number to uploaded file to aviod frequency
                    $imgSending = rand(0, 10000) . '_' . $img_name;

                    // move file uploaded from localstorage to project file
                    move_uploaded_file($img_tmp, "front_section/images/cars/" . $imgSending); // adjust image domin

                    // check if category name is existed in database
                    $chCat = $from_data->prepare("  SELECT 
                                                        * 
                                                    FROM 
                                                        cars 
                                                    WHERE 
                                                        car_name = ?
                                                    AND 
                                                        car_id != ?");
                    $chCat->execute(array($car_name, $car_id));
                    if ($chCat == 1):

                        // Not Allowed to Insert This Name
                        $msg = 'Sorry, Car <strong>(' . $car_name . ')</strong> Has Been Already Inserted';
                        redirectPage($msg, time:3);

                    else:
                        // Allowed to Insert This Name
                        // inserting information into database
                        $insert_car = $from_data->prepare(" UPDATE 
                                                                cars 
                                                            SET
                                                                car_name = ?, 
                                                                car_description = ?, 
                                                                car_price = ?, 
                                                                car_country = ?,
                                                                car_image = ?, 
                                                                car_status = ?, 
                                                                category_id = ?, 
                                                                member_id = ?,
                                                                car_tags = ?
                                                            WHERE
                                                                car_id = ?");
                        // executing MYSQL query
                        $insert_car->execute(array($car_name, $car_desc, $car_price, $country, $imgSending, $model_selected, $category, $member, $car_tags, $car_id));

                        // Successful inserting
                        $msg = 'Car Has Been Updated Successfully';
                        redirectpage($msg, 'success', 'cars.php?page=manage');
                    endif;
                else:
                    // outputing Errors appeared
                    foreach($handleErrors as $error):
                        echo "<div class='container mt-4'>";
                        echo "<div class='alert alert-danger'>" . $error . "</div>";
                        echo "</div>";
                    endforeach;
    
                    // Redirect Message
                    $reMsg = "Please, check your information again";
                    redirectPage($reMsg);
                    
                endif;
                
            else:
                
                echo "<div class='container mt-4'>";
                    echo "<div class='alert alert-danger'>Sorry, You Are Not Allowed To Enter This Page <strong>Directly</strong></div>";
                echo "</div>";
                
            // end checking form request
            endif;
        elseif ($_GET['page'] == 'delete'):

            // check if user id is a numeric value
            $check_id = isset($_GET['car_id']) && is_numeric($_GET['car_id']) ? intval($_GET['car_id']) :0;

            // Check if this id is existed
            $val = checkUsers('car_id', 'cars', $check_id);
            
            // page name
            echo "<div class='container'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Delete Car</h1>";
            echo "</div>";

            if ($val > 0):
                $del = $from_data->prepare("DELETE FROM cars WHERE car_id = :zcar");
                $del->bindParam(":zcar", $check_id);
                $del->execute();
                $msg = 'Car Has Been Deleted Successfully';
                redirectPage($msg);
            else:
                $msg = 'Sorry, This Car is Not On Platform';
                redirectPage($msg);
            endif;
        elseif($_GET['page'] == 'approve'):

            // check if user id is a numeric value
            $check_id = isset($_GET['car_id']) && is_numeric($_GET['car_id']) ? intval($_GET['car_id']) :0;

            // Check if this id is existed
            $val = checkUsers('car_id', 'cars', $check_id);
            
            // page name
            echo "<div class='container'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Approve car</h1>";
            echo "</div>";

            if ($val > 0):
                $del = $from_data->prepare("UPDATE cars SET car_approve = 1 WHERE car_id = :zcat");
                $del->bindParam(":zcat", $check_id);
                $del->execute();
                $msg = 'Car Has Been Approved Successfully';
                redirectPage($msg, 'success');
            else:
                $msg = 'Sorry, This Car is Not On Platform';
                redirectPage($msg);
            endif;
        // end of checing internal pages
        endif;

        // including php files [𝘏𝘛𝘔𝘓 𝘧𝘰𝘰𝘵𝘦𝘳 & 𝘑𝘚 𝘓𝘪𝘣𝘳𝘢𝘳𝘪𝘦𝘴] to run correctly
        include 'back_section/html_parts/footer.php';

        // end of checing session exisitance
    endif;

    // Ending output buffer
    ob_end_flush();

