<?php
include('include/header.php');

function gen_uid($l=5){
    return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, $l);
 }

$UID = $_SESSION['id'];

$sql_orders = "SELECT * FROM orders_hdr WHERE created_by = '$UID' ORDER BY order_id DESC";
$result_orders = mysqli_query($connection,$sql_orders);

?>


    <!--Checkout page section-->
    <div class="Checkout_section mt-70">
       <div class="container">
       <form action=" " method="post">   
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      
                            <h3 style="text-align:center;">My Orders</h3>

                            <?php
       while($row_orders = mysqli_fetch_array($result_orders)){ 
        $ID =  $row_orders['order_id'];

        $sql_orders_dt = "SELECT * FROM orders_dt LEFT JOIN products ON orders_dt.product_id = products.product_id WHERE orders_dt.order_id = '$ID'";
        $result_orders_dt = mysqli_query($connection,$sql_orders_dt);
       ?>
                            <div class="user-actions">
                        <h3 style="background-color:cornflowerblue;"> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Order ID: <?php echo $row_orders['order_ref_id']; ?> | Total Amount: RM <?php echo $row_orders['total_amount']; ?> | Date & Time: <?php echo $row_orders['created_at']; ?>
                            <a class="Returning" style="color:yellow;" href="#checkout_login<?php echo $row_orders['order_id']; ?>" data-bs-toggle="collapse" aria-expanded="true">Click here to View</a>     

                        </h3>
                         <div id="checkout_login<?php echo $row_orders['order_id']; ?>" class="collapse" data-parent="#accordion">
                            <div class="checkout_info">
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
                    <?php
       }
       ?>
                    
                       
                    </div>
                   
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->
    
<?php
include('include/footer.php');

?>