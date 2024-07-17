<?php
session_start();
include 'connection.php';
// Check Auth
if (isset($_SESSION['id']))
{
    if ($_SESSION['id'] != '' && $_SESSION['role'] != 'Admin'){
        header("location: Admin/index.php");
    }
    else if($_SESSION['id'] != '' && $_SESSION['role'] != 'Customer'){
        header("location: Customer/home.php");
    }
}


// POST Method
if (isset($_POST['login']) ){
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection,$_POST['password']);
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connection, $query);
$row_details = mysqli_fetch_array($result);
if ($result) {
$row = mysqli_num_rows($result);
if ($row > 0) {
$_SESSION["id"] = $row_details['user_id'];
$_SESSION["username"] = $row_details['username'];
$_SESSION["role"] = $row_details['role'];

if($row_details['role'] == 'Admin'){
echo "<script>alert('Authentication Success!'); window.location.href='Admin/index.php'</script>";
}
else{
echo "<script>alert('Authentication Success!'); window.location.href='Customer/home.php'</script>";    
}
exit();
} else {
echo "<script>alert('Incorrect Email or Password!'); window.location.href='index.php'</script>";
exit();
}
mysqli_free_result($result);
}
}



if (isset($_POST['register']) ){

$username = mysqli_real_escape_string($connection ,$_POST['username']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
$address = mysqli_real_escape_string($connection, $_POST['address']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$sql = "SELECT * FROM users WHERE email= '$email'";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result) >0){
    echo "<script>alert('Email already Exist! Please try again.'); window.location.href='index.php'</script>";
}
else{
$insert = "INSERT INTO users (username, email,fullname,address,role,password, updated_at) 
VALUES ('$username','$email','$fullname','$address','Customer','$password',CURRENT_TIMESTAMP())";
mysqli_query($connection,$insert);
echo "<script>alert('Registration Success! Please login to your Account.'); window.location.href='index.php'</script>";
}
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ShoeHub</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="Admin/images/sneakers.png">
    
    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="Customer/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="Customer/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="Customer/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="Customer/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="Customer/assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="Customer/assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="Customer/assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="Customer/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="Customer/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="Customer/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="Customer/assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="Customer/assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="Customer/assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>
   
    <!--header area start-->
    
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    
    
    <header style="background-color:#b82e14;">
        <div class="main_header">
            
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <B style="font-size:19px; color:white;">ShoeHub</B>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>

            </div>
        </div> 
    </header>
    <!--header area end-->
    
<!-- customer login start -->
<div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action=" " method="POST">
                            <p>   
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" required>
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" required>
                             </p>   
                            <div class="login_submit">
                 
                               
                                <button type="submit" name="login">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action=" " method="POST">
                            <p>   
                                <label>Username  <span>*</span></label>
                                <input type="text" name="username" required>
                             </p>
                             <p>   
                                <label>Email  <span>*</span></label>
                                <input type="email" name="email" required>
                             </p>
                             <p>   
                                <label>Full Name  <span>*</span></label>
                                <input type="text" name="fullname" required>
                             </p>
                             <p>   
                                <label>Address  <span>*</span></label>
                                <br>
                                <textarea name="address" maxlength="400" rows="5" style="width:100%;" required></textarea>
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" required>
                             </p>
                            <div class="login_submit">
                                <button type="submit" name="register">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->

<!--footer area start-->
<footer class="footer_widgets">
        
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright  © 2024  <a href="#">ShoeHub</a>  . All Rights Reserved.</p>
                        </div>
                    </div>    
                  
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->


    
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="Customer/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="Customer/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="Customer/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="Customer/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="Customer/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="Customer/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="Customer/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="Customer/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="Customer/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="Customer/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="Customer/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="Customer/assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="Customer/assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="Customer/assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="Customer/assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="Customer/assets/js/main.js"></script>



</body>

</html>