<?php
session_start();
include '../connection.php';
$user_id = $_SESSION['id'];


$sql = "SELECT * FROM users WHERE role = 'Customer'";
$result = mysqli_query($connection,$sql);
$totalcustomer = mysqli_num_rows($result);

$sql_total_sum =  "SELECT SUM(total_amount) as totalamount FROM orders_hdr";
$result_total_sum = mysqli_query($connection,$sql_total_sum);
$row_total_sum = mysqli_fetch_array($result_total_sum);

$sql2 = "SELECT * FROM products";
$result2 = mysqli_query($connection,$sql2);
$totalproducts= mysqli_num_rows($result2);

$sql3 = "SELECT * FROM orders_hdr";
$result3 = mysqli_query($connection,$sql3);
$totalorders= mysqli_num_rows($result3);


?>
<?php
include('header.php');
?>
  <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="row g-gs">
                                    <div class="col-xxl-12">
                                        <div class="row g-gs">
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Total Customer</h5>
                                                                <div class="amount h1"><?php echo $totalcustomer; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Total Income</h5>
                                                                <div class="amount h1">RM <?php echo $row_total_sum["totalamount"]; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->

                            
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Total Products</h5>
                                                                <div class="amount h1"><?php echo $totalproducts; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                           
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-sm-between">
                                                            <div></div>
                                                            <div class="card-title mb-0 mt-4 mt-sm-0">
                                                                <h5 class="title mb-3 mb-xl-5">Total Orders</h5>
                                                                <div class="amount h1"><?php echo $totalorders; ?></div>
                                                                <div class="d-flex align-items-center smaller flex-wrap">
                                                                  
                                                                
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
        
                                        </div><!-- .row -->
                                    </div><!-- .col -->
                               
                                </div><!-- .row -->
                            </div>
                        </div>
                    </div>
                </div> <!-- .nk-content -->
<?php
include('footer.php');
?>
