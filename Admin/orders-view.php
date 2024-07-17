<?php
session_start();
include '../connection.php';
?>
<?php
include('header.php');

$user_id = $_SESSION['id'];
$id = $_GET['id'];

$sql_edit =  "SELECT * FROM orders_hdr WHERE order_id = '$id'";
$result_edit = mysqli_query($connection,$sql_edit);
$row_edit = mysqli_fetch_array($result_edit);



$sql_orders_dt = "SELECT * FROM orders_dt LEFT JOIN products ON orders_dt.product_id = products.product_id WHERE orders_dt.order_id = '$id'";
$result_orders_dt = mysqli_query($connection,$sql_orders_dt);

?>


<style>
    .dataTable-container{
        min-height:200px;
    }

    .w3-green,.w3-hover-green:hover{color:#fff!important;background-color:#4CAF50!important}
    .w3-yellow,.w3-hover-yellow:hover{color:#000!important;background-color:#ffeb3b!important}
    .w3-red,.w3-hover-red:hover{color:#fff!important;background-color:#f44336!important}
    .w3-red,.w3-hover-red:hover{color:#fff!important;background-color:#f44336!important}
    .w3-blue,.w3-hover-blue:hover{color:#fff!important;background-color:#2196F3!important}
    .w3-tag{background-color:#000;color:#fff;display:inline-block;padding-left:8px;padding-right:8px;text-align:center}
    .w3-grey,.w3-hover-grey:hover,.w3-gray,.w3-hover-gray:hover{color:#000!important;background-color:#9e9e9e!important}
</style>

   
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <br>       <br>
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between flex-wrap gap g-2">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title">View Order</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                        <li class="breadcrumb-item" aria-current="page">Order Management</li>
                                                        <li class="breadcrumb-item active" aria-current="page">View Order</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                
                                    </div><!-- .nk-block-head-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-gutter-md">
                                        <div class="card-body">
                                            <div class="bio-block">
                                                <h4 class="bio-block-title mb-4">Order Details</h4>
                                               
                                                    
                                                    <div class="row g-3">
                                                

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="homestay_title" class="form-label">Order ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["order_ref_id"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="homestay_title" class="form-label">Total Amount</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="RM <?php echo $row_edit["total_amount"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Payment Status</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["payment_status"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Order Status</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["order_status"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Fullname</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["fullname"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Email</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["email"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Phone</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["phone"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Payment Method</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="<?php echo $row_edit["payment_method"] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="aboutme" class="form-label">Address</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" rows="3" readonly><?php echo $row_edit["address"] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                           
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="card card-gutter-md">
                                        <div class="card-body">
                                            <div class="bio-block">
                                                <h4 class="bio-block-title mb-4">Product Details</h4>
                                               
                                                    
                                                    <div class="row g-3">
                                                    <div class="col-lg-12">
                                                    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php
           while($row_orders_dt = mysqli_fetch_array($result_orders_dt)){ 

            ?>
    <tr>

      <td><?php echo $row_orders_dt['product_name'] ?></td>
      <td><?php echo $row_orders_dt['quantity'] ?></td>
      <td>RM <?php echo $row_orders_dt['amount'] ?></td>
    </tr>
    <?php } ?>
   
  </tbody>
</table>
                                                        </div>
                                                        
                                                      
                                                    </div>
                                                    
                                           
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                  


                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
          
<?php
include('footer.php');
?>
