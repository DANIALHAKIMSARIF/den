<?php
session_start();
include '../connection.php';

$id = $_GET['id'];
$UID = $_SESSION['id'];

$sql_product =  "SELECT * FROM products WHERE product_id = '$id'";
$result_product = mysqli_query($connection,$sql_product);
$row_product = mysqli_fetch_array($result_product);


$sql_check_exist = "SELECT * FROM carts WHERE product_id = '$id' AND created_by = '$UID'";
$result_check_exist = mysqli_query($connection,$sql_check_exist);
$check_exist= mysqli_num_rows($result_check_exist);

if($check_exist <= 0){
$amount = $row_product["product_price"];
$insert = "INSERT INTO carts (product_id,quantity,amount,created_by) 
VALUES ('$id','1','$amount','$UID')";
mysqli_query($connection,$insert);

echo "<script>alert('Product has been added to your Cart !'); window.location.href='cart.php'</script>";
}
else{

$sql_cart =  "SELECT * FROM carts WHERE product_id = '$id' AND created_by = '$UID'";
$result_cart = mysqli_query($connection,$sql_cart);
$row_cart = mysqli_fetch_array($result_cart);

$quantity = $row_cart['quantity'] + 1;

$amount = $row_product["product_price"] * $quantity;

$update = "UPDATE carts SET amount = '$amount',quantity = '$quantity'
WHERE product_id = '$id' AND created_by = '$UID'";

mysqli_query($connection,$update);
echo "<script>alert('Product has been updated to your Cart !'); window.location.href='cart.php'</script>";

}

?>