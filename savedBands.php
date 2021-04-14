<?php
session_start();
if($_SESSION['loggedin']){
    $username = $_SESSION["user"];
    $userid = $_SESSION["userid"];
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saved Bands</title>
</head>
<body>

</body>
</html>
