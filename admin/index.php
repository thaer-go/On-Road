<?php  
    session_start();
    $pageTitle = 'Login';
    $navbar = '';
    include 'links.php';

    // Getting Inside DataBase;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // from html form;
        $name       = $_POST['username'];
        $pass       = $_POST['password'];
        $codPass    = sha1($pass);

        // bring data from database to check fields inserted;
        $infoData = $from_data->prepare("SELECT
                                            user_id, user_name, user_password
                                        FROM
                                            users
                                        WHERE
                                            user_name = ?
                                        AND
                                            user_password = ?
                                        AND
                                            user_group_id = 1
                                        LIMIT 1");
        $infoData->execute(array($name, $codPass));
        $row    = $infoData->fetch();
        $count  = $infoData->rowCount();
        
        // check after binding if data currect;
        if($count > 0) {
            $_SESSION['name']   = $name;
            $_SESSION['id']     = $row['user_id'];
            header('Location: dashboard.php');
            exit();
        }
        
    }
    
?>
    <div class="cover p-2 text-white">
        <div class="logo-onroad">
                <img src="front_section/images/Artboard 2.png" alt="">
            </div>
        <div class=" under-cover container">
            <h1 class="text-center mb-4 display-6">On Road<small>.com</small> </h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="my-form">
                <div class="container">
                    <div class="row justify-content-md-center align-items-center">
                        <div class="col-4">
                            <div class="mb-3">
                                <!-- <label for="exampleFormControlInput1" class="form-label">Username</label> -->
                                <!-- if you want this id  id="exampleFormControlInput1" -->
                                <input 
                                    type="text"
                                    name="username"
                                    class="form-control rounded-pill" 
                                    placeholder="Insert Your Username"
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <!-- <label for="exampleFormControlInput1" class="form-label">Password</label> -->
                                <input 
                                    type="password"
                                    name="password"
                                    class="form-control rounded-pill" 
                                    placeholder="Insert Your Password"
                                    autocomplete="new-password">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="form-control btn main-btn rounded-pill" value="Login Admin">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include 'back_section/html_parts/footer.php';  ?>