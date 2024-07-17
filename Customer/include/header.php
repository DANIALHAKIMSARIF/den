<?php
session_start();

if (!isset($_SESSION['id']))
{
    header("location: ../index.php");
}
include '../connection.php';
$UID = $_SESSION['id'];
$sql_cat = "SELECT * FROM category ORDER BY category_name ASC";
$result_cat = mysqli_query($connection,$sql_cat);

$sql_carts_total = "SELECT * FROM carts WHERE created_by = '$UID'";
$result_carts_total = mysqli_query($connection,$sql_carts_total);
$carts_total= mysqli_num_rows($result_carts_total);

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Customer - DenShoesHub</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>
   
    <!--header area start-->
    
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    
    
    <header style="background-color:azure;">
        <div class="main_header">
            
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <B style="font-size:19px; color:brown;">DenShoesHub</B>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                            <div class="header_right_info">
                           
                                <div class="header_account_area">
                                    <div class="header_account_list register">
                                        <ul>
                                        
                                        <li><a href="#">Hi <b style="color:darkcyan;"><?php echo $_SESSION["username"]; ?></b>!</a> | </li>
                                            <li><a href="../logout.php">Logout</a></li>
                                        </ul>
                                    </div>
                                    <div class="header_account_list  mini_cart_wrapper">
                                       <a href="cart.php"><span class="lnr lnr-cart"></span><span class="item_count"><?php echo $carts_total; ?></span></a>
                                   </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <!--menu start-->
                            <div class="main_menu menu_position"> 
                                <nav>  
                                    <ul>
                                    <li><a href="home.php"> home</a></li>
                                    <li><a href="shop.php"> Shop</a></li>
                                    <li><a href="myorders.php"> My Orders</a></li>
                                    <li><a href="about.php"> About Us</a></li>
                                    <li><a href="contact.php"> Contact Us</a></li>
                                    </ul>  
                                </nav> 
                            </div>
                            <!--menu end-->
                        </div>
                      
                    </div>
                </div>
            </div>
        </div> 
    </header>
    <!--header area end-->