<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>You Need Music</title>
</head>
<body>

    <div class = "genreArtists">
        <div class = "logoMiddleTop">
            <a href="../index.php" class="indexButton">Home</a>
            <a href="../genres.php" class="indexButton">Genres</a>
        </div>
        <br>
        <h1>Grunge Artists</h1>
        <?php
        $bands = file("../grungeBands.txt");
        sort($bands);
        foreach($bands as $band){
            $band2 = str_replace(' ', '', $band);
            ?>
            <div class = "genreArtists">
                <img src="../bandAssets/<?= $band2 . "Logo.png"?>" alt="<?= $band2 . " logo"?>" width="200" height="200">
                <p> <?= $band ?> </p>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>

