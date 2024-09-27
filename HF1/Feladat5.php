<?php

$szam1 = 12;
$szam2 = 254.12;
$jel = '*';

switch ($jel) {
    case '-':
        echo $szam1 - $szam2;
        break;
    case '+':
        echo $szam1 + $szam2;
        break;
    case '*':
        echo $szam1 * $szam2;
        break;
    case '/':
        if ($szam2 != 0) {
            echo $szam1 / $szam2;
        } else {
            echo "Nullaval valo osztas!";
        }
        break;
    default:
        echo "Nem megfelelő bemenet!";
}

?>
