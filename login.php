<?php
if(isset($_POST["submit"])) {
    $servername = getenv('IP');
    $databaseUsername = "root";
    $databasePassword = "grewohl563073";
    $database = "egr223";
    $dbport = 3307;

    $db = new mysqli($servername, $databaseUsername, $databasePassword, $database, $dbport);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $query = "SELECT id, password from users where username = '$user'";
    $result = mysqli_query($db, $query);
    $rowInfo = mysqli_fetch_assoc($result);

    if (password_verify($pass, $rowInfo["password"])) {
        session_start();
        $_SESSION["user"] = $user;
        $_SESSION["userid"] = $rowInfo["id"];
        header("Location: index.php");
    } else {
        print "Invalid username or password!";
    }

}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action = "index.php">
        <div class = "logoMiddle">
            <h1>You Need Music</h1>
            <h5>Login</h5>
            <label>Username: </label>
            <br>
            <input type = "text" placeholder = "Enter Username" name = "user" required>
            <br>
            <label>Password: </label>
            <br>
            <input type = "password" placeholder = "Enter Password" name = "pass" required>
            <br>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</body>
</html>