<?php

require_once 'ArrayManipulator.php';

$arrayManipulator = new ArrayManipulator(['apple' => 4, 'banana' => 6]);
echo $arrayManipulator->apple . "<br>";
$arrayManipulator->apple = 10;
echo $arrayManipulator->apple . "<br>";
echo isset($arrayManipulator->banana) ? "banana létezik <br>" : "banana nem létezik <br>";
unset($arrayManipulator->banana);
echo isset($arrayManipulator->banana) ? "banana létezik <br>" : "banana nem létezik <br>";

echo $arrayManipulator . "<br>";

$clonedManipulator = clone $arrayManipulator;
$clonedManipulator->apple = 27;
echo "Eredeti: " . $arrayManipulator->apple . "<br>";
echo "Clone: " . $clonedManipulator->apple . "<br>";

?>

