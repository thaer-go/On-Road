<?php

    // creating an output buffer
    ob_start();

    // calling variables Globally
    session_start();

    // passing only through a session storeged in cookies & server
    if(isset($_SESSION['name'])):

        // Title of this page
        $pageTitle = 'Comments';
        
        // including php files [𝘏𝘛𝘔𝘓 𝘩𝘦𝘢𝘥𝘦𝘳 & 𝘰𝘵𝘩𝘦𝘳𝘴] to run correctly
        include 'links.php';
        
        // Creating Internal php pages
        // checking the name of this internal page
        isset($_GET['page']) ? $_GET['page'] : 'manage' ;

        // Checking Name of internal page
        if ($_GET['page'] == 'manage'):

            // Header of This Page
            echo "<div class='container text-light'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Comments Page</h1>";
            echo "</div>";

            // Calling data from Database through php & Mysql scripts [join columns from other tables]
            $car = $from_data->prepare("SELECT 
                                            comments.*,
                                            users.user_name,
                                            cars.car_name
                                        FROM 
                                            comments
                                        INNER JOIN
                                            users
                                        ON
                                            users.user_id = comments.user_id
                                        INNER JOIN
                                            cars
                                        ON
                                            cars.car_id = comments.car_id
                                        ORDER BY
                                            comment_id DESC");
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
                                    <th scope="col" class="" style="width:15%">Username</th>
                                    <th scope="col" class="" style="width:10%">Car</th>
                                    <th scope="col" class="text-center">Number</th>
                                    <th scope="col" class="w-50" style="width: 50%">Comments</th>
                                    <th scope="col" class="" style="width:15%">Date</th>
                                    <th scope="col" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fcar as $sp): ?>
                                <tr>
                                    <td><?php echo $sp['user_name']?></td>
                                    <td><?php echo $sp['car_name']?></td>
                                    <th scope='row' class='text-center'><?php echo $sp['comment_id']?></th>
                                    <!-- <td><?php echo $sp['comment_text']?></td> -->
                                    <td>
                                        <input type="text" class="read-only" readonly value="<?php echo $sp['comment_text']?>">
                                    </td>
                                    <td><?php echo $sp['comment_date']?></td>
                                    <td class="text-center" style="min-width:130px">
                                        <div class="d-flex text-center justify-content-evenly">
                                        <a class="del to-edit text-center confirm" href="comments.php?page=delete&comment_id=<?php echo $sp['comment_id']?>">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                        </a>
                                        <a class="to-edit text-center" href="comments.php?page=edit&comment_id=<?php echo $sp['comment_id']?>">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                        <?php if($sp['comment_approve'] == 0):?>
                                        <a class="to-edit text-center" href="comments.php?page=approve&comment_id=<?php echo $sp['comment_id']?>">
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
        elseif ($_GET['page'] == 'edit'):
            
            // check if value if id is numeric
            $comment_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ? intval($_GET['comment_id']) :0;

            // check if category id is existed in database
            $checkCom_id = checkUsers('comment_id', 'comments', $comment_id);
            if($checkCom_id > 0):
            
                $fetchCom = $from_data->prepare("SELECT 
                                                comments.*,
                                                users.user_name,
                                                cars.car_name
                                            FROM 
                                                comments
                                            INNER JOIN
                                                users
                                            ON
                                                users.user_id = comments.user_id
                                            INNER JOIN
                                                cars
                                            ON
                                                cars.car_id = comments.car_id
                                            WHERE
                                                comment_id = ?");
                
                // fetching category information from database
                // $fetchCom = $from_data->prepare("SELECT * FROM comments WHERE comment_id = ?");

                // binding values
                $fetchCom->execute(array($comment_id));

                // fetch information
                $fetchInfo = $fetchCom->fetch();

                // Header of This Page
                echo "<div class='container mt-4 mb-4'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Edit Comment</h1>";
                echo "</div>";?>

                <!-- Form to inserting new category -->
                <div class="container w-50 mb-4">
                    <form action="?page=update" method="POST">
                        <input  type="hidden" 
                                name="comment-id" 
                                value="<?php echo $comment_id?>">
                        <div class="form-floating mb-3">
                            <input  type="text" 
                                class="form-control"
                                value="<?php echo $fetchInfo['user_name']?>" 
                                name="username" 
                                id="floatingInput" 
                                placeholder="example: Sedan" 
                                autpcomplete="off" readonly>
                            <label for="floatingTextarea">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input  type="text" 
                                class="form-control"
                                value="<?php echo $fetchInfo['car_name']?>" 
                                name="car-name" 
                                id="floatingInput" 
                                placeholder="example: Sedan" 
                                autpcomplete="off" readonly>
                            <label for="floatingTextarea">Car Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea   class="form-control" 
                                        name="comment"
                                        placeholder="Leave a comment here" 
                                        id="floatingTextarea"><?php echo $fetchInfo['comment_text']?></textarea>
                            <label for="floatingTextarea"><?php echo $fetchInfo['comment_text']?></label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                    </form>
                </div>
            <?php
            else:
                
                // this ID is not existed
                $msg = 'This Comment is Not existed';
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
                $comment_id         = $_POST['comment-id'];
                $comment_text       = $_POST['comment'];

                // Allowed to Insert This Name
                // inserting information into database
                $insert_com = $from_data->prepare(" UPDATE 
                                                        comments 
                                                    SET
                                                        comment_text = ?
                                                    WHERE
                                                        comment_id = ?");
                // executing MYSQL query
                $insert_com->execute(array($comment_text, $comment_id));

                // Successful inserting
                $msg = 'comment Has Been Updated Successfully';
                redirectpage($msg, 'success', 'comments.php?page=manage');
                
            else:
                
                echo "<div class='container mt-4'>";
                    echo "<div class='alert alert-danger'>Sorry, You Are Not Allowed To Enter This Page <strong>Directly</strong></div>";
                echo "</div>";
                
            // end checking form request
            endif;
        elseif ($_GET['page'] == 'approve'):

            // check if user id is a numeric value
            $check_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ? intval($_GET['comment_id']) :0;

            // Check if this id is existed
            $val = checkUsers('comment_id', 'comments', $check_id);
            
            // page name
            echo "<div class='container'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Approve Comment</h1>";
            echo "</div>";

            if ($val > 0):
                $del = $from_data->prepare("UPDATE comments SET comment_approve = 1 WHERE comment_id = :zcar");
                $del->bindParam(":zcar", $check_id);
                $del->execute();
                $msg = 'Comment Has Been Approved Successfully';
                redirectPage($msg, 'success');
            else:
                $msg = 'Sorry, This Comment is Not On Platform';
                redirectPage($msg);
            endif;
            
        elseif ($_GET['page'] == 'delete'):

            // check if user id is a numeric value
            $check_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ? intval($_GET['comment_id']) :0;

            // Check if this id is existed
            $val = checkUsers('comment_id', 'comments', $check_id);
            
            // page name
            echo "<div class='container'>";
                echo "<h1 class='text-muted text-center mt-4 mb-4'>Delete Comment</h1>";
            echo "</div>";

            if ($val > 0):
                $del = $from_data->prepare("DELETE FROM comments WHERE comment_id = :zcar");
                $del->bindParam(":zcar", $check_id);
                $del->execute();
                $msg = 'Comment Has Been Deleted Successfully';
                redirectPage($msg);
            else:
                $msg = 'Sorry, This Comment is Not On Platform';
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

