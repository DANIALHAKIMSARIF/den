<?php
include('include/header.php');

$sql_carts = "SELECT * FROM carts LEFT JOIN products ON carts.product_id = products.product_id WHERE carts.created_by = '$UID'";
$result_carts = mysqli_query($connection,$sql_carts);

$sql_total_sum =  "SELECT SUM(amount) as totalamount FROM carts WHERE carts.created_by = '$UID'";
$result_total_sum = mysqli_query($connection,$sql_total_sum);
$row_total_sum = mysqli_fetch_array($result_total_sum);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$sql_get_carts = "SELECT * FROM carts LEFT JOIN products ON carts.product_id = products.product_id WHERE carts.created_by = '$UID'";
$result__get_carts = mysqli_query($connection,$sql_get_carts);


while($row_get_carts = mysqli_fetch_array($result__get_carts)){ 
$cartid = $row_get_carts['cart_id'];

$quantity = mysqli_real_escape_string($connection ,$_POST["$cartid"]);
$amount = $row_get_carts['product_price'] * $quantity;

$update = "UPDATE carts SET amount = '$amount',quantity = '$quantity'
WHERE cart_id = '$cartid'";

mysqli_query($connection,$update);

}
    echo "<script>alert('Cart has been successfully updated !!'); window.location.href='cart.php'</script>";
}

?>


     <!--shopping cart area start -->
     <div class="shopping_cart_area mt-70">
        <div class="container">  
            <form action=" " method="POST"> 
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
       while($row_carts = mysqli_fetch_array($result_carts)){ 
       ?>
                                <tr>
                                   <td class="product_remove"><a href="removeproductcart.php?id=<?php echo $row_carts["cart_id"] ?>" onclick="return confirm('Are you sure you want remove this product from Cart?');"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="../Admin/product-image/<?php echo $row_carts["product_img"] ?>" alt=""></a></td>
                                    <td class="product_name"><a href="#"><?php echo $row_carts['product_name']; ?></a></td>
                                    <td class="product-price">RM <?php echo $row_carts['product_price']; ?></td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1" name="<?php echo $row_carts["cart_id"] ?>" max="<?php echo $row_carts["product_stock"] ?>" value="<?php echo $row_carts['quantity']; ?>" type="number"></td>
                                    <td class="product_total">RM <?php echo $row_carts['amount']; ?></td>


                                </tr>
                                <?php
       }
       ?>

                               

                            </tbody>
                        </table>   
                            </div>  
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div>      
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">RM <?php echo $row_total_sum['totalamount']  ?></p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Shipping</p>
                                       <p class="cart_amount"><span>Flat Rate:</span> RM 15.00</p>
                                   </div>
                                  

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">RM <?php echo number_format($row_total_sum['totalamount'] + 15.00, 2, '.', '')  ?></p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="checkout.php">Proceed to Checkout</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
     <!--shopping cart area end -->



<?php
include('include/footer.php');

?>