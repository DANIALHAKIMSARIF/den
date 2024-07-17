<?php
include '../connection.php';
session_start();


    $id =  mysqli_real_escape_string($connection, $_GET['id']);

    $sql = "DELETE FROM products
    WHERE product_id = $id";
    mysqli_query($connection, $sql); //run the query

    echo "<script>alert('Product has been successfully removed !'); window.location.href='products.php'</script>";


