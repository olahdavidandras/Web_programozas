<?php

$lista = array(5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200');
foreach ($lista as $elem) {
    $valtozo = gettype($elem);
    echo $valtozo;
    if (is_numeric($elem)) {
        echo " Igen" . "<br>";
    } else {
        echo " Nem" . "<br>";
    }
}
?>
