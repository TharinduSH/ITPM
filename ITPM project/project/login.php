<?php

include("functions.php");
include("dbconfig.php");

$error = "";

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

    if (user_exists($username,$con)){
        $result = mysqli_query($con,"SELECT password FROM register WHERE name= '$username'");
        $retrivepassword = mysqli_fetch_assoc($result);

        $retrivepassword['password'];

        if ($pass !== $retrivepassword['password']) {
            $error = "Password is incorrect.";
        }
        //session start
        else{
            $_SESSION['uname'] = $username;
            header("location: profile.php");
        }

    }else{
        $error = "Username does not exist";
    }
}

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        echo $username;
    }




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>

    <div class="login-box">
        <center><div id = "error" style="color: red;"> <?php  echo $error ; ?></div></center>


     <img src="images/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form method="POST" action="login.php">
            <div class="form_input">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter your user name"/>
            </div>
            <div class="form_input">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter your password"/>
            </div>
            <div>
                <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
            </div>
        </form>
    </div>

</body>
</html>