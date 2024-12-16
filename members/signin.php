<?php  
    session_start();
    $pageTitle = 'Login';
    $navbar = '';
    include 'links_2.php';
    $change = 'En';
    if(isset($_GET['lang'])) {$change = $_GET['lang'] ?? 'En';};
    include "back_section/languages/" . $change . ".php";
    
    // Getting Inside DataBase;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):

        if (isset($_POST['singIn'])):

            // Check if this user is an admin;
            if (isset($_POST['en-key'])):
                $name       = $_POST['username'];
                $pass       = $_POST['password'];
                $codPass    = sha1($pass);
                $key        = $_POST['en-key'];
                $codKey     = sha1($key);

                // Checking data sent from post
                $checkAdmin = $from_data->prepare(" SELECT Username, Password, AdminKey FROM users WHERE 
                Username = ? AND Password = ? AND AdminKey = ? AND groupID = 1");
                $checkAdmin->execute(Array($name, $codPass, $codKey));
                $row = $checkAdmin->fetch();
                $test = $checkAdmin->rowCount();
                if ($test > 0) {
                    $_SESSION['Username'] = $name;
                    $_SESSION['UserID'] = $row['ID'];
                    header("Location: ../admin/dashboard.php");
                    exit();
                } else {
                    header("Location: signin.php");
                    exit();
                }
                
            else:
                $name       = $_POST['username'];
                $pass       = $_POST['password'];
                $codPass    = sha1($pass);

                // Checking data sent from post
                $checkMember = $from_data->prepare(" SELECT Username, Password FROM users WHERE 
                Username = ? AND Password = ? AND groupID = 0");
                $checkMember->execute(Array($name, $codPass));
                $row = $checkMember->fetch();
                $test = $checkMember->rowCount();
                if ($test > 0) {
                    $_SESSION['Username'] = $name;
                    $_SESSION['UserID'] = $row['ID'];
                    header("Location: ../members/profile.php");
                exit();
                } else {
                    header("Location: signin.php");
                exit();
                }
            endif;
        elseif (isset($_POST['signUp'])):

            $errorBox = [];
                
            $userName   = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $email      = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pass1      = $_POST['password-1'];
            $passGet    = sha1($pass1);
            $pass2      = $_POST['password-2'];
            $name       = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
            if(!empty($pass1) && !empty($pass2)):
                if ($pass1 !== $pass2) $errorBox[] = "please check your password again";
            endif;
            if(empty($errorBox)):
                $checkUser = checkUsers('Username', 'users', $userName);
                if ($checkUser > 0):
                    $errorBox[] = "This Username is Already Existed, Insert Another Username, Please!";
                else:
                    $signUp = $from_data->prepare("INSERT INTO 
                        users(Username, Password, Email, Name, RegStatus, GroupID, RegDate)
                        VALUES(:zusername, :zpass, :zemail, :zname, 1, 0, NOW())");
                    $signUp->execute(array(
                        'zusername'     => $userName,
                        'zpass'         => $passGet,
                        'zemail'        => $email,
                        'zname'         => $name
                    ));
                    // here to code php 
                    $_SESSION['Username'] = $name;
                    $_SESSION['UserID'] = $row['ID'];
                    header("Location: profile.php");
                    exit();
                endif;
            else:
                // Checking Box;
                echo "<div class='php-check'>";
                foreach($errorBox as $error):
                echo "<p>".$error."</p>";
                endforeach;
                echo "<span class='php-button'>Check Again</span>";
                echo "</div>";
            endif;
        endif;
    endif;?>
    <!-- Start sign-in -->
    <div class="sign">
        <h1 class="text-light mb-5 w-75"><?php echo $lang['h1'];?>
        <li class="nav-item langs">
            <span class="icon" data-plog="hide"><i class="fa-solid fa-chevron-down"></i></span>
            <a class="active"><?php echo $change?></a>
            <a href="?lang=En">En</a>
            <a href="?lang=Ru">Ru</a>
        </li>
        </h1>
        <div class="container">
            <div class="form-signin">
                <form class="sign-in" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-floating mb-3 w-75">
                        <input  type="text" 
                                class="form-control" 
                                name="username" 
                                id="floatingInput" 
                                placeholder="name@example.com"
                                required>
                        <label for="floatingInput"><?php echo $lang['form']['label-1'];?></label>
                    </div>
                    <div class="form-floating mb-3 w-75">
                        <input  type="password" 
                                class="form-control" 
                                name="password" 
                                id="floatingPassword" 
                                placeholder="Password" 
                                autocomplete="new-password"
                                required>
                        <label for="floatingPassword"><?php echo $lang['form']['label-2'];?></label>
                    </div>
                    <div class="form-check form-switch">
                        <input  class="form-check-input check-admin"
                                style="cursor:pointer" 
                                type="checkbox" 
                                role="switch" 
                                id="flexSwitchCheckDefault"
                                >
                        <label  class="form-check-label" 
                                for="flexSwitchCheckDefault" 
                                style="color:#fff"><?php echo $lang['form']['label-3'];?></label>
                    </div>
                    <div class="form-floating mb-3 w-75">
                        <input  type="password"
                                style="transition:.3s"
                                class="form-control admin-key" 
                                name="dis-key" 
                                id="floatingPassword" 
                                placeholder="key" 
                                autocomplete="new-password" 
                                disabled
                                required>
                        <label for="floatingPassword"><?php echo $lang['form']['label-4'];?></label>
                    </div>
                    <div class="options w-75">
                        <button class="btn btn-primary in" 
                                name="singIn" 
                                type="submit"><?php echo $lang['form']['button-1'];?></button>
                        <span id="signUp"><?php echo $lang['form']['span-1'];?></span>
                        <span><a href="../index.php"><?php echo $lang['form']['span-2'];?></a></span>
                    </div>
                </form>
                <form class="sign-up" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-floating mb-3 w-75">
                        <input  type ="text"
                                name = "username"
                                class ="form-control" 
                                id="floatingInput" 
                                placeholder="mikeround"
                                autocomplete="off"
                                required>
                        <label for="floatingInput"><?php echo $lang['form']['label-1'];?></label>
                    </div>
                    <div class="form-floating mb-3 w-75">
                        <input  type="email"
                                name="email"
                                class="form-control" 
                                id="floatingInput" 
                                placeholder="name@example.com"
                                autocomplete="off"
                                required>
                        <label for="floatingInput"><?php echo $lang['form']['label-5'];?></label>
                    </div>
                    <div class="form-floating mb-3 w-75">
                        <input  type="password"
                                name = "password-1"
                                class="form-control" 
                                id="floatingPassword" 
                                placeholder="Password"
                                required>
                        <label for="floatingPassword"><?php echo $lang['form']['label-2'];?></label>
                    </div>
                    <div class="form-floating mb-3 w-75">
                        <input  type="password"
                                name = "password-2"
                                class="form-control" 
                                id="floatingPassword" 
                                placeholder="Password"
                                required>
                        <label for="floatingPassword"><?php echo $lang['form']['label-6'];?></label>
                    </div>
                    <div class="form-floating mb-3 w-75">
                        <input  type="text"
                                name="fullname"
                                class="form-control" 
                                id="floatingInput" 
                                placeholder="mike round"
                                autocomplete="off"
                                required>
                        <label for="floatingInput"><?php echo $lang['form']['label-7'];?></label>
                    </div>
                    <div class="options w-75">
                        <button class="btn btn-primary ex" name="signUp" type="submit"><?php echo $lang['form']['button-2'];?></button>
                        <span id="signIn"><?php echo $lang['form']['button-1'];?></span>
                        <span><a href="../index.php"><?php echo $lang['form']['span-2'];?></a></span>
                    </div>
                </form>
            </div>
            <div class="about">
                <h4 class="mb-4"><?php echo $lang['about']['h4'];?></h4>
                <p><?php echo $lang['about']['p-1']?></p>
            </div>
        </div>
    </div>
    <!-- End sign-in -->
<script src="front_section/js/sign.js"></script>