<?php
    function findGenre($band = ""){
        $txtFile = 'grungeBands.txt';
        genreSearcher($band, $txtFile, "grunge.php");
        $txtFile = 'metalBands.txt';
        genreSearcher($band, $txtFile, "metal.php");
    }

    function genreSearcher($wantedBand = "", $genreFile = "", $genre = ""){
        $bands = file($genreFile, FILE_IGNORE_NEW_LINES);
        sort($bands);
        foreach($bands as $band){
            $band = str_replace(' ', '', $band);
            echo $band;
            echo $wantedBand;
            if($wantedBand == $band){
                header('Location: genrePages/' . $genre);
            }
        }
    }
