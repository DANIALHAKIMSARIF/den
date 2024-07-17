<?php
include '../connection.php';
session_start();


    $id =  mysqli_real_escape_string($connection, $_GET['id']);

    $sql = "DELETE FROM carts
    WHERE cart_id = $id";
    mysqli_query($connection, $sql); //run the query

    echo "<script>alert('Product has been successfully removed from Cart !'); window.location.href='cart.php'</script>";


