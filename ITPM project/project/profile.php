<?php

if(isset($_GET['username'])){
    header("Location : login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>WELCOME TO PROFILE!!</h1>

<button onclick="window.location.href = 'logout.php';">Log OUT</button>

</body>
</html>