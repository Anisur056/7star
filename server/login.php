<?php 
session_start();



if (isset($_GET['logout'])) {
    if ($_GET['logout'] === 'true') {
        session_unset();
        session_destroy();
    }
}

// $h_password = password_hash('12345', PASSWORD_DEFAULT);
// echo $h_password."<br>";

        include("config.php");

    if(isset($_POST['id']) && isset($_POST['password'])){
        $id = $_POST['id'];
        $password = $_POST['password'];

        if(empty($id)){
            header('location: login.php?error=ID Number is Required....');
        } else if(empty($password)) {
            header('location: login.php?error=Password is Required....');
        } else{
            $sql = "SELECT * FROM user WHERE id='$id'";

            $result=mysqli_query($connect_db,$sql);
            
            $count =  mysqli_num_rows($result);

            if($count === 1){
                $data = mysqli_fetch_array($result);
               
                $db_id = $data['id'];
                $db_password = $data['password'];
                $db_full_name = $data['full_name'];

                if($id === $db_id){
                    if(password_verify($password, $db_password)){

                        $_SESSION['id'] = $db_id;
                        $_SESSION['full_name'] = $db_full_name;
                        $_SESSION['login_time'] = time();
                        header('location: index.php');

                    }else{
                        header('location: login.php?error=Incorrect User name or Password .....');
                    }

                }else{
                    header('location: login.php?error=Incorrect User name or Password .....');
                }

            }else{
                 header('location: login.php?error=Incorrect User name or Password .....');
            }
            
        }
    }
 ?>

<?php if (!isset($_SESSION['id']) && !isset($_SESSION['full_name'])) { ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>7 Star Cargo => Login Page</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Page</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="POST">
                                            <?php if (isset($_GET['error'])) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                      <?php echo $_GET['error']; ?>
                                                    </div>
                                            <?php } ?>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Your ID</label>
                                                <input class="form-control py-4" type="text" name="id" placeholder="Enter Your ID ..." />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                           
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-primary" type="submit" name="submit" value="Login" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <!-- <div class="small"><in href="register.html">Need an account? Sign up!</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>


            <!--------------FOOTER PAGE INCLUD START----------------->

            <?php include "include/footer.php"; ?>

            <!--------------FOOTER PAGE INCLUD ENDS----------------->


        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

            <?php }else{ header('location: index.php'); } ?>
