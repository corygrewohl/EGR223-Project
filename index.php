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
        <a href="index.php" class="indexButton">Home</a>
        <a href="index.php" class="indexButton">Home</a>
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
                $band2 = str_replace(' ', '', $band);
                ?>
                <li> <a href=<?= "index.php?bandName=" . $band2 ?>> <?=$band?> </a> </li>
                <?php
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
