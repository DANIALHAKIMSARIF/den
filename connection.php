<?php
$host = "localhost"; $uname = "root"; $pass = ""; $name = "shoehub";
  $connection = mysqli_connect($host, $uname, $pass, $name); 
  if(mysqli_connect_errno()){ 
    echo 'Connection Error : ' .mysqli_connect_error();
  }

?>