<?php 
session_start(); 
include_once('../db_connection.php');
if (strlen($_SESSION['id']>0)) {
    header('location:dashboard.php');
}else{
 
// Code for login 
if(isset($_POST['login']))
{
    $password=$_POST['password'];
    $dec_password=$password;
    $useremail=$_POST['uemail'];
    $ret= mysqli_query($conn_integration,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
    $num=mysqli_fetch_array($ret);
    var_dump($num);
    if($num>0)
    {

    $_SESSION['id']=$num['id'];
    $_SESSION['name']=$num['fname'];
    header("location:dashboard.php");

    }
    else
    {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<?php include_once("./common/login-header.php"); ?>

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-5">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <form method="post">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           
                           <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Subscription</h3>
                            
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="uemail" type="email" placeholder="name@example.com" required />
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control" name="password" type="password" placeholder="Password" required />
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <!-- <a href="">Forgot Password</a> -->
                        </div>
                        <button name="login"  class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                    </div>
                </form>
                </div>
            </div>
        </div>

<?php
    }
    include_once("./common/footer.php");
  ?>