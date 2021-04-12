<?php
    if(isset($_POST["submit"])){
        $servername = getenv('IP');
        $databaseUsername = "root";
        $databasePassword = "grewohl563073";
        $database = "egr223";
        $dbport = 3307;

        $db = new mysqli($servername, $databaseUsername, $databasePassword, $database, $dbport);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $email = $_POST["email"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $user = $_POST["user"];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users VALUES(null, '$firstname', '$lastname', '$email', '$user', '$pass', null)";
        $result = mysqli_query($db, $query);

        if($result){
            Header("Location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
<form method = "post">
    <div class = "logoMiddle">
        <h1>You Need Music</h1>
        <h5>Create a new account</h5>

        <label>Email: </label>
        <br>
        <input type = "text" placeholder = "Enter Email" name = "email" required>
        <br>
        <label>Enter First Name: </label>
        <br>
        <input type = "text" placeholder = "Enter First Name" name = "firstname" required>
        <br>
        <label>Enter Last Name: </label>
        <br>
        <input type = "text" placeholder = "Enter Last Name" name = "lastname" required>
        <br>
        <label>Username: </label>
        <br>
        <input type = "text" placeholder = "Enter Username" name = "user" required>
        <br>
        <label>Password: </label>
        <br>
        <input type="password" placeholder="Enter Password" name = "pass" required>
        <br>
        <input type="submit" name="submit" value="Sign Up">
    </div>
</form>
</body>
</html>