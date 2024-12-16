<?php

ob_start();
session_start();
if (isset($_SESSION['Username'])) {

    $pageTitle = 'Members';
    include "links.php";
    $page = isset($_GET['page']) ? $_GET['page'] : 'noPage';

    if ($page == 'manage'):
        $platform_admins = $from_data->prepare("SELECT * FROM users WHERE RegStatus = 1
                                                    AND GroupID = 1 ORDER BY Username ASC");
        $platform_admins->execute();
        $rows = $platform_admins->fetchAll();

        $platform_members = $from_data->prepare("SELECT * FROM users WHERE RegStatus = 1
                                                    AND GroupID = 0 ORDER BY Username ASC");
        $platform_members->execute();
        $rows2 = $platform_members->fetchAll();
        
        if(! empty($rows)):?>
            <div class="member-page container">
                <h1 class="text-muted text-center mt-4 mb-4">On-Road Users</h1>
                <div class="choose-member">
                    <span class="active" data-manage = 'changed'>Admins</span>
                    <span data-manage = 'to change'>Members</span>
                </div>
                <div class="table-responsive tables">
                    <table class="table managers" style="transition:.3s">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Email</th>
                                <th scope="col">FUll Name</th>
                                <th scope="col">Date</th>
                                <th class="text-center" scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody class="table-manage " style="transition:.3s">
                            <?php
                            foreach($rows as $row):
                            ?>
                            <tr>
                                <th scope="row"><?php echo$row['Username']?></th>
                                <td class="text-break"><?php echo isset($row['Avatar']) ? 'image':'No Image';?></td>
                                <td><?php echo $row['Email']?> </td>
                                <td><?php echo$row['Name']?></td>
                                <td><?php echo$row['RegDate']?></td>
                                <td class="d-flex justify-content-evenly">
                                    <a class="del to-edit text-center confirm" href="members.php?page=delete&ID=<?php echo $row['ID']?>">
                                        <span><i class="fa-solid fa-user-slash"></i></span>
                                    </a>
                                    <a class="to-edit text-center" href="members.php?page=edit&ID=<?php echo $row['ID']?>">
                                        <span><i class="fa-solid fa-pen-to-square"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php if(! empty($rows)):?>
                        <table class="table members" style="display:none; transition:.3s">
                            <thead>
                                <tr>
                                    <th scope="col">Username2</th>
                                    <th scope="col">Avatar2</th>
                                    <th scope="col">Email2</th>
                                    <th scope="col">FUll Name</th>
                                    <th scope="col">Date</th>
                                    <th class="text-center" scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody class="table-manage " style="transition:.3s">
                                <?php
                                foreach($rows2 as $new):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo$new['Username']?></th>
                                    <td class="text-break"><?php echo isset($new['Avatar']) ? 'image':'No Image';?></td>
                                    <td><?php echo $new['Email']?> </td>
                                    <td><?php echo$new['Name']?></td>
                                    <td><?php echo$new['RegDate']?></td>
                                    <td class="d-flex justify-content-evenly">
                                        <a class="del to-edit text-center confirm" href="members.php?page=delete&ID=<?php echo $new['ID']?>">
                                            <span><i class="fa-solid fa-user-slash"></i></span>
                                        </a>
                                        <a class="to-edit text-center" href="members.php?page=edit&ID=<?php echo $new['ID']?>">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <a href="?page=add" class="btn btn-success admin-btn"> New Admin
                <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        <?php else:?>
            <div class="alert alert-dark">There is no record</div>
            <a href="?page=add" class="btn btn-success"> Add New Admin
                <i class="fa-solid fa-plus"></i>
            </a>
        <?php endif;
    elseif($page == 'pending'):
        $not_activate = "AND RegStatus = 0";
        $platform_members = $from_data->prepare("SELECT 
                                                    * 
                                                FROM
                                                    users
                                                WHERE
                                                    RegStatus = 0
                                                ORDER BY
                                                    ID DESC");
        $platform_members->execute();
        $rows = $platform_members->fetchAll();
        if(! empty($rows)):?>
            <div class="container">
                <h1 class="text-muted text-center mt-4 mb-4">Unregisted Admins</h1>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Email</th>
                                <th scope="col">FUll Name</th>
                                <th scope="col">Date</th>
                                <th class="text-center" scope="col">Activate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($rows as $row):
                            ?>
                            <tr>
                                <th scope="row"><?php echo$row['user_name']?></th>
                                <td class="text-break"><?php echo isset($row['avatar']) ? 'image':'No Image';?></td>
                                <td><?php echo $row['user_email']?> </td>
                                <td><?php echo$row['user_full_name']?></td>
                                <td><?php echo$row['user_date']?></td>
                                <td>
                                    <a class="to-edit text-center d-block" href="members.php?page=activate&user_id=<?php echo $row['user_id']?>">
                                        <span><i class="fa-solid fa-plus fa-lg"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=add" class="btn btn-success"> Add member
                <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        <?php else:?>
            <div class="container mt-4">
                <div class="alert alert-dark">There is No Record To Show</div>
                <a href="?page=add" class="btn btn-success"> Add member
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        <?php endif;
    elseif($page == 'add'):?>
        <div class="container">
            <h1 class="text-muted text-center mt-4 mb-4">Add New Members</h1>
            <form class="add-member mx-auto" action="?page=insert" method="POST" enctype="multipart/form-data">
                <div class="form-floating mb-3 ">
                    <input  type ="text"
                            name = "username"
                            class ="form-control" 
                            id="floatingInput" 
                            placeholder="mikeround"
                            autocomplete="off">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="email"
                            name="email"
                            class="form-control" 
                            id="floatingInput" 
                            placeholder="name@example.com"
                            autocomplete="off">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="password"
                            name = "password"
                            class="form-control" 
                            id="floatingPassword" 
                            placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="text"
                            name="fullname"
                            class="form-control" 
                            id="floatingInput" 
                            placeholder="mike round"
                            autocomplete="off">
                    <label for="floatingInput">Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="text"
                            name="register-key"
                            class="form-control" 
                            id="floatingInput" 
                            placeholder="mike round"
                            autocomplete="off">
                    <label for="floatingInput">Registeration Key</label>
                </div>
                <div class="mb-3">
                    <input  type="file"
                            name="img-file"
                            class="form-control form-control-sm" 
                            id="formFileSm" >
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
            </form>
        </div>
        
    <?php elseif($page == 'insert'):

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            
            // Creating variables for inputs recieved from Form of 𝘢𝘥𝘥 page;
            $username           = $_POST['username'];
            $email              = $_POST['email'];
            $password           = $_POST['password'];
            $encrypted          = sha1($password);
            $full_name          = $_POST['fullname'];
            $register_key       = $_POST['register-key'];
            $encryp_key        = sha1($register_key);

            // Creating variables for uploaded files from Form od 𝘢𝘥𝘥 page
            $img_name   = $_FILES['img-file']['name'];
            $img_type   = $_FILES['img-file']['type'];
            $img_tmp    = $_FILES['img-file']['tmp_name'];
            $img_size   = $_FILES['img-file']['size'];
            
            // allowed file extention to upload
            $allowedFileExtention = array('jpg', 'jpeg', 'png', 'gif');

            // getting uploaded file extention
            $toArray = explode('.', $img_name);
            $extentionAllowed = strTolower(end($toArray));
            
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
                move_uploaded_file($img_tmp, "front_section/avatars/" . $imgSending);

                echo "<div class='container'>";
                    echo "<h1 class='text-muted text-center mt-4 mb-4'>Insert Page</h1>";
                echo "</div>";
                
                // check Username existing
                $check = checkUsers('Username', 'users', $username);
                if ($check == 1):
                    $reMsg = "Please, Insert Another Username";
                    redirectPage($reMsg);
                else:
                    // type MYSQL query of inserting data
                    $sendInfo = $from_data->prepare("INSERT INTO 
                    users(Username, Email, Name, Password, GroupID, RegStatus, RegDate, AdminKey, Avatar)
                    VALUES(:zuser, :zemail, :zfullname, :zpass, 1, 1, NOW(), :zkey, :zimg)");

                    $sendInfo->execute(array(
                        'zuser'     => $username,
                        'zemail'    => $email,
                        'zfullname' => $full_name,
                        'zpass'     => $encrypted,
                        'zkey'      => $encryp_key,
                        'zimg'      => $imgSending
                    ));

                    // Successfully Inerting Information
                    $reMsg = "Information Has Been Inserted Successfully";
                    redirectPage($reMsg, 'success',"members.php?page=manage");
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

        else :
            // statment Not allowed
            $reMsg = "You Did not Insert Any Information";
            redirectPage($reMsg, url:"members.php?page=add", time:3);
        endif;

    elseif($page == 'edit'):

        // check if User ID is Numeric
        $id_number = isset($_GET['ID']) && is_numeric($_GET['ID']) ? intval($_GET['ID']) :0;
        
        // Fetch User information to Edit
        $edit_info = $from_data->prepare("SELECT * FROM users WHERE ID = ? LIMIT 1");
        $edit_info->execute(array($id_number));
        $admin_data = $edit_info->fetch();
        $check_info = $edit_info->rowCount();?>

        <div class="container">
            <h1 class="text-muted text-center mt-4 mb-4">Edit Your information</h1>
            <form class="add-member mx-auto" action="?page=update" method="POST">
                <div class="form-floating mb-3">
                    <input  type="hidden"
                            name = "user-id"
                            class="form-control" 
                            id="floatingPassword" 
                            value="<?php echo $admin_data['ID']?>">
                </div>
                <div class="form-floating mb-3 ">
                    <input  type ="text"
                            name = "username"
                            class ="form-control" 
                            id="floatingInput" 
                            placeholder="mikeround"
                            value="<?php echo $admin_data['Username']?>">
                            
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="email"
                            name="email"
                            class="form-control" 
                            id="floatingInput" 
                            placeholder="name@example.com"
                            value="<?php echo $admin_data['Email']?>">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="hidden"
                            name = "old-password"
                            class="form-control" 
                            id="floatingPassword" 
                            value="<?php echo $admin_data['Password']?>">
                </div>
                <div class="form-floating mb-3">
                    <input  type="password"
                            name = "new-password"
                            class="form-control" 
                            id="floatingPassword" 
                            placeholder="Password">
                    <label for="floatingPassword">New Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input  type="text"
                            name="fullname"
                            class="form-control" 
                            id="floatingInput" 
                            placeholder="mike round"
                            value="<?php echo $admin_data['Name']?>">
                    <label for="floatingInput">Full Name</label>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Update Information</button>
                </div>
            </form>
        </div>
        
    <?php elseif($page == 'update'):

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            
            // Creating variables for inputs recieved from Form of 𝘢𝘥𝘥 page;
            $user_id    = $_POST['user-id'];
            $username   = $_POST['username'];
            $email      = $_POST['email'];
            $password   = empty($_POST['new-password']) ? $_POST['old-password'] : sha1($_POST['new-password']) ;
            $full_name  = $_POST['fullname'];
            
            // Handling Errors From Server Side Using php
            $handleErrors = array();
            
            // List of Errors 
            // include code here

            // Sending Database Correct Form of Data Inserted
            if (empty($handleErrors)):

                // need to check if there is another username as chosen with different id
                $check_un = $from_data->prepare("SELECT * FROM users WHERE Username = ? AND ID != ?");
                $check_un->execute(array($username, $user_id));
                $count = $check_un->rowCount();
                
                // check Username existing
                if ($count == 1):
                    $reMsg = "Please, Insert Another Username";
                    redirectPage($reMsg);
                else:
                    // type MYSQL query of Editing data
                    $sendInfo = $from_data->prepare("UPDATE 
                                                        users 
                                                    SET
                                                        Username = ?,
                                                        Email = ?,
                                                        Password = ?,
                                                        Name = ?
                                                    WHERE
                                                        ID = ?");
                    $sendInfo->execute(array($username, $email, $password, $full_name, $user_id));

                    // Successfully Inerting Information
                    $reMsg = "Information Has Been Updating Successfully";
                    redirectPage($reMsg, 'success',"members.php?page=manage");
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

        else :
            // statment Not allowed
            $reMsg = "You Did not Insert Any Information";
            redirectPage($reMsg, url:"members.php?page=add", time:3);
        endif;
    elseif($page == 'delete'):

        // check if user id is a numeric value
        $check_id = isset($_GET['ID']) && is_numeric($_GET['ID']) ? intval($_GET['ID']) :0;
        $val = checkUsers('ID', 'users', $check_id);
        echo "<div class='container'>";
            echo "<h1 class='text-muted text-center mt-4 mb-4'>Delete Page</h1>";
        echo "</div>";
        if ($val > 0):
            $del = $from_data->prepare("DELETE FROM users WHERE ID = :zuser");
            $del->bindParam(":zuser", $check_id);
            $del->execute();
            $msg = 'Admin Has Been Deleted Successfully';
            redirectPage($msg, 'success');
        else:
            $msg = 'Sorry, This Username is Not On Platform';
            redirectPage($msg);
        endif;

    elseif($page == 'activate'):

        // check if user id is a numeric value
        $check_id = isset($_GET['ID']) && is_numeric($_GET['ID']) ? intval($_GET['ID']) :0;
        $val = checkUsers('ID', 'users', $check_id);
        echo "<div class='container'>";
            echo "<h1 class='text-muted text-center mt-4 mb-4'>Activate Page</h1>";
        echo "</div>";
        if ($val > 0):
            $del = $from_data->prepare("UPDATE users SET RegStatus = 1 WHERE ID = ?");
            $del->execute(array($check_id));
            $msg = 'Member Has Been Registered Successfully';
            redirectPage($msg, 'success');
        else:
            $msg = 'Sorry, This Username is Not On Platform';
            redirectPage($msg);
        endif;
        
    elseif($page == 'noPage'):

    endif;
    
    include "back_section/html_parts/footer.php";
} else {
    header("Location: index.php");
    exit();
}
ob_end_flush();

