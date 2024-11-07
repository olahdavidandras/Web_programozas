<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// 1. feladat
$lista = array(5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200');
$task1 = "";
foreach ($lista as $elem) {
    $valtozo = gettype($elem);
    $task1 .= $valtozo;
    if (is_numeric($elem)) {
        $task1 .= " Igen<br>";
    } else {
        $task1 .= " Nem<br>";
    }
}
$_SESSION['tasks']['task1'] = $task1;

// 2. feladat
$sec = 21.1;
if (is_int($sec)) {
    $orak = floor($sec / 3600);
    $maradekSec = $sec % 3600;
    $percek = floor($maradekSec / 60);
    $masodperc = $maradekSec % 60;

    $_SESSION['tasks']['task2'] = "<p>{$orak} ora, {$percek} perc es {$masodperc} masodperc.</p>";
} else {
    $_SESSION['tasks']['task2'] = "Nem egesz szam volt megadva";
}

// 3. feladat
$szam1 = 12;
$szam2 = 2.1;
$task3 = "";
$task3 .= "$szam1 + $szam2 = " . ($szam1 + $szam2) . "<br>";
$task3 .= "$szam1 - $szam2 = " . ($szam1 - $szam2) . "<br>";
$task3 .= "$szam1 * $szam2 = " . ($szam1 * $szam2) . "<br>";
$task3 .= "$szam1 / $szam2 = " . ($szam1 / $szam2) . "<br>";
$task3 .= "$szam1 ^ $szam2 = " . (pow($szam1, $szam2)) . "<br>";
$_SESSION['tasks']['task3'] = $task3;

// 4. feladat
$task4 = "<table border=\"1\" border-spacing=\"0\" padding=\"0\">";
for ($sor = 1; $sor <= 3; $sor++) {
    $task4 .= "<tr>";
    for ($oszlop = 1; $oszlop <= 3; $oszlop++) {
        $ossz = $sor + $oszlop;
        $bgcolor = ($ossz % 2 == 0) ? "#FFFFFF" : "#000000";
        $task4 .= "<td height=\"35px\" width=\"30px\" bgcolor=\"$bgcolor\"></td>";
    }
    $task4 .= "</tr>";
}
$task4 .= "</table>";
$_SESSION['tasks']['task4'] = $task4;

// 5. feladat
$szam1 = 12;
$szam2 = 254.12;
$jel = '*';
switch ($jel) {
    case '-':
        $_SESSION['tasks']['task5'] = $szam1 - $szam2;
        break;
    case '+':
        $_SESSION['tasks']['task5'] = $szam1 + $szam2;
        break;
    case '*':
        $_SESSION['tasks']['task5'] = $szam1 * $szam2;
        break;
    case '/':
        $_SESSION['tasks']['task5'] = ($szam2 != 0) ? $szam1 / $szam2 : "Nullaval valo osztas!";
        break;
    default:
        $_SESSION['tasks']['task5'] = "Nem megfelelő bemenet!";
}

// 6. feladat
$honap = "4";
if ($honap == 1 || $honap == 2 || $honap == 12) {
    $task6 = "Tel";
} elseif ($honap >= 3 && $honap <= 5) {
    $task6 = "Tavasz";
} elseif ($honap >= 6 && $honap <= 8) {
    $task6 = "Nyar";
} elseif ($honap >= 9 && $honap <= 11) {
    $task6 = "Osz";
} else {
    $task6 = "Nem letezo honapot adtal meg!";
}

$task6 .= "<br>";

switch (true) {
    case ($honap == 1 || $honap == 2 || $honap == 12):
        $task6 .= "Tel";
        break;
    case ($honap >= 3 && $honap <= 5):
        $task6 .= "Tavasz";
        break;
    case ($honap >= 6 && $honap <= 8):
        $task6 .= "Nyar";
        break;
    case ($honap >= 9 && $honap <= 11):
        $task6 .= "Osz";
        break;
    default:
        $task6 .= "Nem letezo honapot adtal meg!";
}
$_SESSION['tasks']['task6'] = $task6;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bonusz</title>
</head>
<body>
<h2>Első feladat</h2>
<div><?php echo $_SESSION['tasks']['task1']; ?></div>

<h2>Második feladat</h2>
<div><?php echo $_SESSION['tasks']['task2']; ?></div>

<h2>Harmadik feladat</h2>
<div><?php echo $_SESSION['tasks']['task3']; ?></div>

<h2>Negyedik feladat</h2>
<div><?php echo $_SESSION['tasks']['task4']; ?></div>

<h2>Ötödik feladat</h2>
<div><?php echo $_SESSION['tasks']['task5']; ?></div>

<h2>Hatodik feladat</h2>
<div><?php echo $_SESSION['tasks']['task6']; ?></div>
</body>
</html>
