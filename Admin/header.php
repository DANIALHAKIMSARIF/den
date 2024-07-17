<?php
if (!isset($_SESSION['id']))
{
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Admin - DenShoesHub</title>
    <link rel="shortcut icon" href="images/sneakers.png">
    <link rel="stylesheet" href="assets/css/style.css?v1.1.1">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    
    <div class="nk-app-root">
        
        <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="index.php" class="logo-link">
                            <div class="logo-wrap">
                                <img class="logo-img logo-light" src="images/sneakers.png" srcset="images/sneakers.png 2x" alt="">
                                <img class="logo-img logo-dark" src="images/sneakers.png" srcset="images/sneakers.png 2x" alt="">
                                <img class="logo-img logo-icon" src="images/sneakers.png" srcset="images/sneakers.png 2x" alt="">
                            </div>
                            <span>  <B style="font-size:19px; color:white;">DenShoesHub</B></span>
                        </a>
                        <div class="nk-sidebar-toggle me-n1">
                            <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                                <em class="icon ni ni-arrow-left"></em>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                            <li class="nk-menu-item">
                                    <a href="index.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title">Management</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="products.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                                        <span class="nk-menu-text">Product Management</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="orders.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                                        <span class="nk-menu-text">Order Management</span>
                                    </a>
                                </li>

                               
                                    </ul>
                                </li>
                          
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="nk-wrap">
                <div class="nk-header nk-header-fixed">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-header-logo ms-n1">
                                <div class="nk-sidebar-toggle">
                                    <button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em class="icon ni ni-menu"></em></button>
                                    <button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu"></em></button>
                                </div>
                                <div class="nk-navbar-toggle me-2">
                                    <button class="btn btn-sm btn-icon btn-zoom navbar-toggle d-sm-none"><em class="icon ni ni-menu-right"></em></button>
                                    <button class="btn btn-md btn-icon btn-zoom navbar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu-right"></em></button>
                                </div>
                                <a href="html/index.html" class="logo-link">
                                    <div class="logo-wrap">
                                        <img class="logo-img logo-light" src="images/logo.png" srcset="images/logo2x.png 2x" alt="">
                                        <img class="logo-img logo-dark" src="images/logo-dark.png" srcset="images/logo-dark2x.png 2x" alt="">
                                        <img class="logo-img logo-icon" src="images/logo-icon.png" srcset="images/logo-icon2x.png 2x" alt="">
                                    </div>
                                </a>
                            </div>
                            <nav class="nk-header-menu nk-navbar">
                            
                                      
                            </nav>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav ms-2">
                                  
                                 
                                    <li class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown">
                                            <div class="d-sm-none">
                                                <div class="media media-md media-circle">
                                                    <img src="images/sneakers.png" alt="" class="img-thumbnail">
                                                </div>
                                            </div>
                                            <div class="d-none d-sm-block">
                                                <div class="media media-circle">
                                                    <img src="images/sneakers.png" alt="" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md">
                                            <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                                <div class="media-group">
                                                    <div class="media media-xl media-middle media-circle"><img src="images/sneakers.png" alt="" class="img-thumbnail"></div>
                                                    <div class="media-text">
                                                        <div class="lead-text"><?php echo $_SESSION["username"] ?></div>
                                                        <span class="sub-text">Administrator</span>
                                                    </div>
                                                </div>
                                            </div>
                                      
                                            <div class="dropdown-content dropdown-content-x-lg py-3">
                                                <ul class="link-list">
                                                    <li><a href="../logout.php"><em class="icon ni ni-signout"></em> <span>Log Out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header -->