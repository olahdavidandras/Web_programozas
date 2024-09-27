<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $nyelv => $napoknNyelv) {
    echo $nyelv . ": ";
    $i = 1;
    foreach ($napoknNyelv as $index => $nap) {
        if ($i % 2 == 0) {
            echo "<strong>$nap</strong>";
        } else {
            echo "$nap";
        }
        if ($index < count($napoknNyelv) - 1) {
            echo ", ";
        }
        $i++;
    }
    echo "<br>";
}
?>
