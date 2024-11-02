<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// 1. feladat
$lista = array(5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200');
ob_start();
foreach ($lista as $elem) {
    $valtozo = gettype($elem);
    echo $valtozo;
    if (is_numeric($elem)) {
        echo " Igen" . "<br>";
    } else {
        echo " Nem" . "<br>";
    }
}
$_SESSION['tasks']['task1'] = ob_get_clean();

// 2. feladat
$sec = 21.1;
ob_start();
if (is_int($sec)) {
    $orak = floor($sec / 3600);
    $maradekSec = $sec % 3600;
    $percek = floor($maradekSec / 60);
    $masodperc = $maradekSec % 60;

    echo "<p><strong>{$orak} ora</strong>, {$percek} perc es {$masodperc} masodperc.</p>";
} else {
    echo "Nem egesz szam volt megadva";
}
$_SESSION['tasks']['task2'] = ob_get_clean();

// 3. feladat
$szam1 = 12;
$szam2 = 2.1;
ob_start();
echo "$szam1 + $szam2 = " . ($szam1 + $szam2) . "<br>";
echo "$szam1 - $szam2 = " . ($szam1 - $szam2) . "<br>";
echo "$szam1 * $szam2 = " . ($szam1 * $szam2) . "<br>";
echo "$szam1 / $szam2 = " . ($szam1 / $szam2) . "<br>";
echo "$szam1 ^ $szam2 = " . (pow($szam1, $szam2)) . "<br>";
$_SESSION['tasks']['task3'] = ob_get_clean();

// 4. feladat
ob_start();
echo <<<EOD
<table border="1" border-spacing="0" padding="0">
EOD;

for ($sor = 1; $sor <= 3; $sor++) {
    echo <<<EOD
    <tr>
EOD;
    for ($oszlop = 1; $oszlop <= 3; $oszlop++) {
        $ossz = $sor + $oszlop;
        if ($ossz % 2 == 0) {
            echo <<<EOD
            <td height="35px" width="30px" bgcolor="#FFFFFF"></td>
EOD;
        } else {
            echo <<<EOD
            <td height="35px" width="30px" bgcolor="#000000"></td>
EOD;
        }
    }

    echo <<<EOD
    </tr>
EOD;
}

echo <<<EOD
</table>
EOD;
$_SESSION['tasks']['task4'] = ob_get_clean();

// 5. feladat
$szam1 = 12;
$szam2 = 254.12;
$jel = '*';
ob_start();
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
$_SESSION['tasks']['task5'] = ob_get_clean();

// 6. feladat
$honap = "4";
ob_start();
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
$_SESSION['tasks']['task6'] = ob_get_clean();
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
