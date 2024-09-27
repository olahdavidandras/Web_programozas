<?php

function atalakit($tomb, $meret) {
    $res = array();

    foreach ($tomb as $kulcs => $ertek) {
        if ($meret == "kisbetus") {
            $res[$kulcs] = strtolower($ertek);
        } elseif ($meret == "nagybetus") {
            $res[$kulcs] = strtoupper($ertek);
        }
    }

    return $res;
}

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

$kisbetus = atalakit($szinek, "kisbetus");
print_r($kisbetus);

echo "<br>";

$nagybetus = atalakit($szinek, "nagybetus");
print_r($nagybetus);

echo "<br>";

function atalakitMap($tomb, $meret) {
    if ($meret == "kisbetus") {
        return array_map('strtolower', $tomb);
    } elseif ($meret == "nagybetus") {
        return array_map('strtoupper', $tomb);
    }
    return $tomb;
}

$kisbetusMap = atalakitMap($szinek, "kisbetus");
print_r($kisbetusMap);

echo "<br>";

$nagybetusMap = atalakitMap($szinek, "nagybetus");
print_r($nagybetusMap);

?>
