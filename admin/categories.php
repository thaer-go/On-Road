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
        
        // Creating Internal php pages
        // checking the name of this internal page
        isset($_GET['page']) ? $_GET['page'] : 'manage' ;

        // Checking Name of internal page
        if ($_GET['page'] == 'manage'):

            // Calling data from Database through php & Mysql scripts
            $cat = $from_data->prepare("SELECT * FROM categories ORDER BY CatID ASC");

            // executing MYSQL query
            $cat->execute();

            // fetching data from database
            $data = $cat->fetchAll();

            // Checking if there are fields in this table
            $check = $cat->rowCount();
            if ($check > 0) :?>
                <!-- Starting HTML -->
                <!-- showing fields chosen in a table created by [𝘉𝘰𝘰𝘵𝘴𝘵𝘳𝘢𝘱 𝘷5.1] -->
                <div class="container">
                <h1 class='text-muted text-center mt-4 mb-4'>Categories Page</h1>
                    <div class="table-responsive text-white">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Number</th>
                                    <th scope="col" class="w-25">Car Cateogry</th>
                                    <th scope="col" class="w-75">Cateogry Description</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $sp): ?>
                                <tr>
                                    <th scope='row' class='text-center'><?php echo $sp['CatID']?></th>
                                    <td><?php echo $sp['CatName']?></td>
                                    <td><?php echo $sp['CatDescription']?></td>
                                    <td class="text-center" style="min-width:130px">
                                        <div class="d-flex justify-content-evenly">
                                        <a class="del to-edit text-center confirm" href="categories.php?page=delete&CatID=<?php echo$sp['CatID']?>">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                        </a>
                                        <a class="to-edit text-center" href="categories.php?page=edit&CatID=<?php echo$sp['CatID']?>">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                        <?php if($sp['category_approve'] == 0):?>
                                        <a class="to-edit text-center" href="categories.php?page=approve&CatID=<?php echo $sp['CatID']?>">
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
                    <a href="?page=add" class="btn btn-success"> New Category
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

            // Calling data from Database through php & Mysql scripts
            $cats = $from_data->prepare("SELECT * FROM categories WHERE category_parent = 0 ORDER BY category_id ASC");

            // executing MYSQL query
            $cats->execute();

            // fetching data from database
            $catLists = $cats->fetchAll();
            
            // Header of This Page
            echo "<div class='container mt-4 mb-4'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Add Category</h1>";
            echo "</div>";?>

            <!-- Form to inserting new category -->
            <div class="container w-50">
                <form action="?page=insert" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" name="category-name" class="form-control" id="floatingInput" placeholder="example: Sedan" autpcomplete="off">
                        <label for="floatingInput">Categoy Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="category-description"placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Category Description</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="category-order" id="floatingInput" placeholder="example: Sedan" autpcomplete="off">
                        <label for="floatingTextarea">Category Order</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Choose Category Image</label>
                        <input  type="file"
                            name="img-file"
                            class="form-control form-control-sm" 
                            id="formFileSm" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Choose Category Type</label>
                        <div class="form-check">
                            <input selected = 'selected' name="parent" class="form-check-input" type="radio" value="0" id="main-category" checked>
                            <label class="form-check-label" for="main-category">
                                Main Category
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="parent" type="radio" value="1" id="sub-category">
                            <label class="form-check-label" for="sub-category">
                                Sub-category 
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select id="selecting" class="select form-select" name="main-category" aria-label="Default select example" disabled>
                            <option selected>Open this select menu</option>
                            <?php
                            // loop on categories exsited
                            foreach ($catLists as $catList):
                                echo "<option value='". $catList['category_id'] ."'>". $catList['category_name'] ."</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Allow Category visibility</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="visible" id="v0" checked>
                            <label class="form-check-label" for="v0">
                                Visibility
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" name="visible" id="v1">
                            <label class="form-check-label" for="v1">
                                Non-visibility 
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Allow Category Comments</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="comment" id="c0" checked>
                            <label class="form-check-label" for="c0">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" name="comment" id="c1" >
                            <label class="form-check-label" for="c1">
                                No 
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="exampleFormControlInput1" class="form-label">Allow Category Advertisments</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="ads" id="ad0" checked>
                            <label class="form-check-label" for="ad0">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" name="ads" id="ad1">
                            <label class="form-check-label" for="ad1">
                                No
                            </label>
                        </div>
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
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Insert Category</h1>";
                echo "</div>";
                
                // Dealing with information recieved from form
                $cat_name       = $_POST['category-name'];
                $cat_desc       = $_POST['category-description'];
                $cat_order      = $_POST['category-order'];
                $cat_parent     = $_POST['parent'];
                $cat_visible    = $_POST['visible'];
                $cat_comment    = $_POST['comment'];
                $cat_ads        = $_POST['ads'];

                // check if category created is subcategory
                $main_cat = isset($_POST['main-category']) ? $cat_parent = $_POST['main-category'] : $cat_parent ;

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
                    move_uploaded_file($img_tmp, "front_section/images/categories/" . $imgSending); // adjust image domin

                    // check if category name is existed in database
                    $chCat = checkUsers('category_name', 'categories', $cat_name);
                    if ($chCat > 0):

                        // Not Allowed to Insert This Name
                        $msg = 'Sorry, Category <strong>(' . $cat_name . ')</strong> Has Been Already Inserted';
                        redirectPage($msg, time:3);
                else:

                    // Allowed to Insert This Name
                    // inserting information into database
                    $insert_cat = $from_data->prepare(" INSERT INTO 
                    categories(category_name, category_description, category_parent, category_order, category_visibility, allow_comment, allow_ads, category_image)
                                                        VALUES
                    (:zname, :zdesc, :zparent, :zorder, :zvisibile, :zcomment, :zads, :zimage)");

                    // executing MYSQL query
                    $insert_cat->execute(array(
                        'zname'     => $cat_name,
                        'zdesc'     => $cat_desc,
                        'zparent'   => $main_cat,
                        'zorder'    => $cat_order,
                        'zvisibile' => $cat_visible,
                        'zcomment'  => $cat_comment,
                        'zads'      => $cat_ads,
                        'zimage'    => $imgSending
                    ));

                    // Successful inserting
                    $msg = 'Category Has Been Inserted Successfully';
                    redirectpage($msg, 'success');
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
                
                // check if category created is subcategory
                $main_cat = isset($_POST['main-category']) ? $cat_parent = $_POST['main-category'] : $cat_parent ;

                // check if category name is existed in database
                $chCat = checkUsers('category_name', 'categories', $cat_name);
                if ($chCat > 0):

                    // Not Allowed to Insert This Name
                    $msg = 'Sorry, Category <strong>(' . $cat_name . ')</strong> Has Been Already Inserted';
                    redirectPage($msg, time:3);
                else:

                    // Allowed to Insert This Name
                    // inserting information into database
                    $insert_cat = $from_data->prepare(" INSERT INTO 
                    categories(category_name, category_description, category_parent, category_order, category_visibility, allow_comment, allow_ads)
                                                        VALUES
                    (:zname, :zdesc, :zparent, :zorder, :zvisibile, :zcomment, :zads)");

                    // executing MYSQL query
                    $insert_cat->execute(array(
                        'zname'     => $cat_name,
                        'zdesc'     => $cat_desc,
                        'zparent'   => $main_cat,
                        'zorder'    => $cat_order,
                        'zvisibile'  => $cat_visible,
                        'zcomment'  => $cat_comment,
                        'zads'      => $cat_ads
                    ));

                    // Successful inserting
                    $msg = 'Category Has Been Inserted Successfully';
                    redirectpage($msg, 'success');
                    
                endif;
                
            else:
                
                echo "<div class='container mt-4'>";
                    echo "<div class='alert alert-danger'>Sorry, You Are Not Allowed To Enter This Page <strong>Directly</strong></div>";
                echo "</div>";
                
            // end checking form request
            endif;
        elseif ($_GET['page'] == 'edit'):
            
            // check if value if id is numeric
            $cat_id = isset($_GET['category_id']) && is_numeric($_GET['category_id']) ? intval($_GET['category_id']) :0;

            // check if category id is existed in database
            $checkCat_id = checkUsers('category_id', 'categories', $cat_id);
            if($checkCat_id > 0):
            
                // fetching category information from database
                $fetchCat = $from_data->prepare("SELECT * FROM categories WHERE category_id = ?");

                // binding values
                $fetchCat->execute(array($cat_id));

                // fetch information
                $fetchInfo = $fetchCat->fetch();

                // Header of This Page
                echo "<div class='container mt-4 mb-4'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Edit Category</h1>";
                echo "</div>";?>

                <!-- Form to inserting new category -->
                <div class="container w-50">
                    <form action="?page=update" method="POST" enctype="multipart/form-data">
                        <input  type="hidden" 
                                name="category-id" 
                                value="<?php echo $cat_id?>">
                        <div class="form-floating mb-3">
                            <input  type="text" 
                                    name="category-name" 
                                    value="<?php echo $fetchInfo['category_name']?>" 
                                    class="form-control" id="floatingInput" 
                                    placeholder="example: Sedan" 
                                    autpcomplete="off">
                            <label for="floatingInput">Categoy Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea   class="form-control" 
                                        name="category-description"
                                        placeholder="Leave a comment here" 
                                        id="floatingTextarea"><?php echo $fetchInfo['category_description']?>"</textarea>
                            <label for="floatingTextarea">Category Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input  type="text" 
                                class="form-control" 
                                name="category-order" 
                                value="<?php echo $fetchInfo['category_order']?>" 
                                id="floatingInput" 
                                placeholder="example: Sedan" 
                                autpcomplete="off">
                            <label for="floatingTextarea">Category Order</label>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Choose Category Image</label>
                            <input  type="file"
                                name="img-file"
                                class="form-control form-control-sm" 
                                id="formFileSm" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Choose Category Type</label>
                            <div class="form-check">
                                <input  name="parent" 
                                        class="form-check-input" 
                                        type="radio" 
                                        value="0" 
                                        id="main-category"
                                        <?php if($fetchInfo['category_parent'] == 0) echo 'checked' ?>>
                                <label class="form-check-label" for="main-category">
                                    Main Category
                                </label>
                            </div>
                            <div class="form-check">
                                <input  name="parent" 
                                        class="form-check-input"
                                        type="radio" 
                                        value="1" 
                                        id="sub-category"
                                        <?php if($fetchInfo['category_parent'] == 1) echo 'checked' ?>>
                                <label class="form-check-label" for="sub-category">
                                    Sub-category 
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select     id="selecting" 
                                        class="select form-select" 
                                        name="main-category" 
                                        aria-label="Default select example" 
                                        <?php if($fetchInfo['category_parent'] != 1) echo 'disabled' ?>>
                                <?php
                                $parent = $from_data->prepare("SELECT * FROM categories WHERE category_parent = 0");
                                $parent->execute();
                                $catPs = $parent->fetchAll();?>
                                <!-- // loop on categories exsited -->
                                <option value="0">Choose From The List</option>
                                <?php foreach ($catPs as $catP):?>
                                    <option value="<?php echo $catP['category_id']?>" <?php if ($catP['category_id'] == $fetchInfo['category_parent']) {echo 'selected';}?>><?php echo $catP['category_name']?></option>
                                    <!-- <option value="<?php $catP['category_id']?>" <?php if ($catP['category_id'] == $fetchInfo['category_parent']) {echo 'selected';}?>><?php $catP['category_name']?> -->
                                    </option>
                                <?php endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="exampleFormControlInput1" class="form-label">Allow Category visibility</label>
                            <div class="form-check">
                                <input  class="form-check-input" 
                                        type="radio" 
                                        value="0" 
                                        name="visible" 
                                        id="v0" 
                                        <?php if($fetchInfo['category_parent'] == 0) echo 'checked' ?>>
                                <label class="form-check-label" for="v0">
                                    Visibility
                                </label>
                            </div>
                            <div class="form-check">
                                <input  class="form-check-input" 
                                        type="radio" 
                                        value="1" 
                                        name="visible" 
                                        id="v1"
                                        <?php if($fetchInfo['category_parent'] == 1) echo 'checked' ?>>
                                <label class="form-check-label" for="v1">
                                    Non-visibility 
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="exampleFormControlInput1" class="form-label">Allow Category Comments</label>
                            <div class="form-check">
                                <input  class="form-check-input" 
                                        type="radio" 
                                        value="0" 
                                        name="comment" 
                                        id="c0" 
                                        <?php if($fetchInfo['category_parent'] == 0) echo 'checked' ?>>
                                <label class="form-check-label" for="c0">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input  class="form-check-input" 
                                        type="radio" 
                                        value="1" 
                                        name="comment" 
                                        id="c1" 
                                        <?php if($fetchInfo['category_parent'] == 1) echo 'checked' ?>>
                                <label class="form-check-label" for="c1">
                                    No 
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="exampleFormControlInput1" class="form-label">Allow Category Advertisments</label>
                            <div class="form-check">
                                <input  class="form-check-input" 
                                        type="radio" 
                                        value="0" 
                                        name="ads" 
                                        id="ad0" 
                                        <?php if($fetchInfo['category_parent'] == 0) echo 'checked' ?>>
                                <label class="form-check-label" for="ad0">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input  class="form-check-input" 
                                        type="radio" 
                                        value="1" 
                                        name="ads" 
                                        id="ad1"
                                        <?php if($fetchInfo['category_parent'] == 1) echo 'checked' ?>>
                                <label class="form-check-label" for="ad1">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Confirm Information</button>
                        </div>
                    </form>
                </div>
            <?php
            else:
                
                // this ID is not existed
                $msg = 'This Category is Not existed Anymore';
                redirectPage($msg);
                
            endif;
        elseif ($_GET['page'] == 'update'):

            // Check if request of entering this page is from a form
            if ($_SERVER['REQUEST_METHOD'] == 'POST'):

                // Header of This Page
                echo "<div class='container mt-4 mb-4'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Update Category</h1>";
                echo "</div>";
                
                // Dealing with information recieved from form
                $cat_id         = $_POST['category-id'];
                $cat_name       = $_POST['category-name'];
                $cat_desc       = $_POST['category-description'];
                $cat_order      = $_POST['category-order'];
                $cat_parent     = $_POST['parent'];
                $cat_visible    = $_POST['visible'];
                $cat_comment    = $_POST['comment'];
                $cat_ads        = $_POST['ads'];
                
                // check if category created is subcategory
                $main_cat = isset($_POST['main-category']) ? $cat_parent = $_POST['main-category'] : $cat_parent ;

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
                    move_uploaded_file($img_tmp, "front_section/images/categories/" . $imgSending); // adjust image domin
                    
                    // check if category name is existed in database
                    $chCat = $from_data->prepare("  SELECT 
                                                        * 
                                                    FROM 
                                                        categories 
                                                    WHERE 
                                                        category_name = ?
                                                    AND 
                                                        category_id != ?");
                    $chCat->execute(array($cat_name, $cat_id));
                    if ($chCat == 1):

                        // Not Allowed to Insert This Name
                        $msg = 'Sorry, Category <strong>(' . $cat_name . ')</strong> Has Been Already Inserted';
                        redirectPage($msg, time:3);
                    else:
                        // Allowed to Insert This Name
                        // inserting information into database
                        $insert_cat = $from_data->prepare(" UPDATE 
                                                                categories 
                                                            SET
                                                                category_name = ?, 
                                                                category_description = ?, 
                                                                category_parent = ?, 
                                                                category_order = ?, 
                                                                category_visibility = ?, 
                                                                allow_comment = ?, 
                                                                allow_ads = ?,
                                                                category_image = ?
                                                            WHERE
                                                                category_id = ?");
                        // executing MYSQL query
                        $insert_cat->execute(array($cat_name, $cat_desc, $main_cat, $cat_order, $cat_visible, $cat_comment, $cat_ads, $imgSending, $cat_id));

                        // Successful inserting
                        $msg = 'Category Has Been Updated Successfully';
                        redirectpage($msg, 'success');
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
            $check_id = isset($_GET['category_id']) && is_numeric($_GET['category_id']) ? intval($_GET['category_id']) :0;

            // Check if this id is existed
            $val = checkUsers('category_id', 'categories', $check_id);
            
            // page name
            echo "<div class='container'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Delete Category</h1>";
            echo "</div>";

            if ($val > 0):
                $del = $from_data->prepare("DELETE FROM categories WHERE category_id = :zcat");
                $del->bindParam(":zcat", $check_id);
                $del->execute();
                $msg = 'Category Has Been Deleted Successfully';
                redirectPage($msg, 'success');
            else:
                $msg = 'Sorry, This Category is Not On Platform';
                redirectPage($msg);
            endif;
        elseif($_GET['page'] == 'approve'):

            // check if user id is a numeric value
            $check_id = isset($_GET['category_id']) && is_numeric($_GET['category_id']) ? intval($_GET['category_id']) :0;

            // Check if this id is existed
            $val = checkUsers('category_id', 'categories', $check_id);
            
            // page name
            echo "<div class='container'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Approve Category</h1>";
            echo "</div>";

            if ($val > 0):
                $del = $from_data->prepare("UPDATE categories SET category_approve = 1 WHERE category_id = :zcat");
                $del->bindParam(":zcat", $check_id);
                $del->execute();
                $msg = 'Category Has Been Approved Successfully';
                redirectPage($msg, 'success');
            else:
                $msg = 'Sorry, This Category is Not On Platform';
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

