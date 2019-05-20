 <?php

  $con = mysqli_connect("localhost", "root" , "", "mydatabase");

  if (mysqli_connect_errno()) {
    echo "Error occured while connecting ".mysqli_connect_errno();
  }


  session_start();


 ?>
