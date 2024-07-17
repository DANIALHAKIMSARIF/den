<?php
include 'connection.php';
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['role']);
echo "<script>alert('Account has been Sign Out Successfully!'); window.location.href='index.php'</script>";
?>