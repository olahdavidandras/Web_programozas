<?php

$honap = "12";

if ($honap == 1 || $honap == 2 || $honap == 12) {
    echo "Tel";
} elseif ($honap >= 3 && $honap <= 5) {
    echo "Tavasz";
} elseif ($honap >= 6 && $honap <= 8) {
    echo "Nyar";
} elseif ($honap >= 9 && $honap <= 11) {
    echo "Osz";
} else {
    echo "Nem letezo honapot adtal meg!";
}

echo "<br>";

switch (true) {
    case ($honap == 1 || $honap == 2 || $honap == 12):
        echo "Tel";
        break;
    case ($honap >= 3 && $honap <= 5):
        echo "Tavasz";
        break;
    case ($honap >= 6 && $honap <= 8):
        echo "Nyar";
        break;
    case ($honap >= 9 && $honap <= 11):
        echo "Osz";
        break;
    default:
        echo "Nem letezo honapot adtal meg!";
}

?>