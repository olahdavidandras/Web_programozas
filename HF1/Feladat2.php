<?php

$sec = 21.1;

if (is_int($sec)) {
    $orak = floor($sec / 3600);
    $maradekSec = $sec % 3600;
    $percek = floor($maradekSec / 60);
    $masodperc = $maradekSec % 60;

    echo "<p><strong>{$orak} ora</strong>, {$percek} perc es {$masodperc} masodperc.</p>";
} else {
    echo "Nem egesz szam volt megadva";
}

?>
