<?php
include('include/header.php');

function gen_uid($l=5){
    return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, $l);
 }

$UID = $_SESSION['id'];

$sql_customer =  "SELECT * FROM users WHERE user_id = '$UID'";
$result_customer = mysqli_query($connection,$sql_customer);
$row_customer = mysqli_fetch_array($result_customer);

$sql_carts = "SELECT * FROM carts LEFT JOIN products ON carts.product_id = products.product_id WHERE carts.created_by = '$UID'";
$result_carts = mysqli_query($connection,$sql_carts);

$sql_total_sum =  "SELECT SUM(amount) as totalamount FROM carts WHERE carts.created_by = '$UID'";
$result_total_sum = mysqli_query($connection,$sql_total_sum);
$row_total_sum = mysqli_fetch_array($result_total_sum);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//Fetch all products in CART
$sql_get_carts = "SELECT * FROM carts LEFT JOIN products ON carts.product_id = products.product_id WHERE carts.created_by = '$UID'";
$result__get_carts = mysqli_query($connection,$sql_get_carts);


//insert to order_
$fullname = mysqli_real_escape_string($connection ,$_POST["fullname"]);
$address = mysqli_real_escape_string($connection ,$_POST["address"]);
$phone = mysqli_real_escape_string($connection ,$_POST["phone"]);
$email = mysqli_real_escape_string($connection ,$_POST["email"]);
$check_method = mysqli_real_escape_string($connection ,$_POST["check_method"]);
$totalamount = $row_total_sum["totalamount"];
$orderid = gen_uid(10);

$insertHDR = "INSERT INTO orders_hdr (order_ref_id, total_amount, payment_status, order_status, fullname, address, email, phone, payment_method, created_by, updated_by, updated_at) 
VALUES ('$orderid','$totalamount','Paid','Active','$fullname','$address','$email','$phone','$check_method','$UID','$UID',CURRENT_TIMESTAMP())";
mysqli_query($connection,$insertHDR);

$last_id = $connection->insert_id;



while($row_get_carts = mysqli_fetch_array($result__get_carts)){ 


//Insert Odder Details
$productid = $row_get_carts['product_id'];
$amount = $row_get_carts['amount'];
$quantity = $row_get_carts['quantity'];

$insertDT = "INSERT INTO orders_dt (order_id, product_id, amount, quantity, created_by) 
VALUES ('$last_id','$productid','$amount','$quantity','$UID')";
mysqli_query($connection,$insertDT);

//updatestock
$stock = $row_get_carts['product_stock'] - $row_get_carts['quantity'];
$update = "UPDATE products SET product_stock = '$stock'
WHERE product_id = '$productid'";

mysqli_query($connection,$update);

$cart_id = $row_get_carts['cart_id'];
//Delete Cart
$removecart = "DELETE FROM carts 
WHERE cart_id = '$cart_id'";

mysqli_query($connection,$removecart);

}
echo "<script>alert('Payment Success! Thank your for the purchase :)'); window.location.href='myorders.php'</script>";

}

?>


    <!--Checkout page section-->
    <div class="Checkout_section mt-70">
       <div class="container">
       <form action=" " method="post">   
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                      
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-12 mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="fullname" value="<?php echo $row_customer['fullname']; ?>" required>    
                                </div>
                                
                          

                                <div class="col-12 mb-20">
                                    <label>Address  <span>*</span></label>
                                    <br>
                                    <textarea maxlength="500" name="address" rows="7" style="width:100%;"required><?php echo $row_customer['address']; ?></textarea>     
                                </div>
                               
                                <div class="col-lg-6 mb-20">
                                    <label>Phone <span>*</span></label>
                                    <input type="number" name="phone" required> 
                                </div> 
                                 <div class="col-lg-6 mb-20">
                                    <label> Email Address   <span>*</span></label>
                                      <input type="email" name="email" value="<?php echo $row_customer['email']; ?>" required readonly> 
                                </div> 
                           
                                   	    	    	    	    	    	    
                            </div>
                       
                    </div>
                    <div class="col-lg-6 col-md-6">
               
                            <h3>Your order</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
       while($row_carts = mysqli_fetch_array($result_carts)){ 
       ?>
                                        <tr>
                                            <td> <?php echo $row_carts['product_name']; ?> <strong> ×  <?php echo $row_carts['quantity']; ?></strong></td>
                                            <td> RM <?php echo $row_carts['amount']; ?></td>
                                        </tr>
                                        <?php
       }
       ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>RM <?php echo $row_total_sum['totalamount']  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>RM 15.00</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>RM <?php echo number_format($row_total_sum['totalamount'] + 15.00, 2, '.', '')  ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>
                            <div class="payment_method">
                               <div class="panel-default">
                                    <input id="payment" name="check_method" type="radio" data-target="createp_account" value="Cash On Delivery" required/>
                                    <a href="#method" data-bs-toggle="collapse" aria-controls="method">Cash On Delivery</a>   
                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay when the Goods arrived at your place.</p>
                                        </div>
                                    </div>
                                </div> 
                               <div class="panel-default">
                                    <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" value="Online Banking" required/>
                                    <a href="#collapsedefult" data-bs-toggle="collapse" aria-controls="collapsedefult">Online Banking <img src="assets/img/icon/papyel.png" alt=""></a>   
                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay via Online Banking.</p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button">
                                    <button  type="submit">Pay Now</button> 
                                </div>    
                            </div> 
                        </form>         
                    </div>
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->
    
<?php
include('include/footer.php');

?>