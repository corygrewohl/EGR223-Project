<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>You Need Music</title>
</head>
<body>
    <h1>h</h1>
    <?php
        $bands = file("../metalBands.txt");
        foreach($bands as $band){
            echo $band . " ";
        }
    ?>
</body>
</html>
