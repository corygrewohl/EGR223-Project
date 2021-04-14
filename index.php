<?php
session_start();
if(isset($_SESSION['loggedin'])) {
    $userid = $_SESSION["userid"];
}
//if(!isset($_SESSION["user"])){
//    header('Location: login.php');
//}
//if($_SESSION['loggedin']){
//    $username = $_SESSION["user"];
//    $userid = $_SESSION["userid"];
//}else{
//    header("Location: login.php");
//}

    //$_POST[]
global $saveBand;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>You Need Music</title>
</head>
<body>
    <?php
        include 'functions.php';
    ?>
    <div class = logoMiddleTop>
        <a href="index.php" class="indexButton">Home</a>
        <a href="genres.php" class="indexButton">Genres</a>
    </div>
    <div class = "loginButtons">
        <a href="savedBands.php" class="indexButton">Saved Bands</a>
        <?php
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == 0){
        ?>
        <a href="login.php" class="indexButton">Login</a>
        <?php
            } else {
                echo $_SESSION['user'];
                $_SESSION['loggedin'] = 1;
                ?>
                <a href="logout.php" class="indexButton">Logout</a>
                <?php
            }
        ?>

    </div>
    <div class = "logoMiddle">
        <h1>You Need Music</h1>
        <h5>Search or browse the bands below</h5>
        <form class = "searchBar">
            <input type = "text" placeholder="Search music catalog">
            <button type = "submit"></button>
        </form>
        <ul>
            <?php
            $bands = file("allBands.txt");
            sort($bands);

            foreach($bands as $band){
                if (isset($_POST['save'])) {
                    if (isset($_SESSION['loggedin'])) {
                        $servername = getenv('IP');
                        $databaseUsername = "root";
                        $databasePassword = "grewohl563073";
                        $database = "egr223";
                        $dbport = 3307;

                        $db = new mysqli($servername, $databaseUsername, $databasePassword, $database, $dbport);
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }

                        $query = "INSERT into savedbands values (null, '$band', '$userid')";
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                            echo "Insertion Error. Should have used TempleOS.";
                        }
                    } else {
                        header('Location: login.php');
                    }
                    unset($_POST['save']);
                }
                $band2 = str_replace(' ', '', $band);
                ?>
                <li> <a href=<?= "index.php?bandName=" . $band2 ?>> <?=$band?> </a> </li>
                <form method="post">
                    <input type="submit" value="Save" name="save">
                </form>
<!--                --><?php
//                if(isset($_POST['save'])){
//                    $saveBand = $band;
//                    echo $saveBand;
//                    unset($_POST['save']);
//                }
            }

            if(isset($_GET["bandName"])) {
                findGenre($_GET["bandName"]);
            }
            ?>
        </ul>
    </div>
    <br>
    <div class = logoMiddle>

    </div>
</body>
</html>
