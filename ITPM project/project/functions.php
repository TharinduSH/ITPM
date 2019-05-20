<?php

  function user_exists($username, $con){

      $result = mysqli_query($con, "SELECT email FROM register WHERE name= '$username'");

      if (mysqli_num_rows($result) == 1)
      {
          return true;
      }
      else {
          return false;
      }


  }
?>