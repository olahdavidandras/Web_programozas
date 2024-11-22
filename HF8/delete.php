<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HF8";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM hallgatok WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Sikeres törlés<br>";
        echo "<a href='listazas.php'>Vissza</a>";
    } else {
        echo "Hiba történt: " . $conn->error;
    }
} else {
    echo "Hiba történt: nincs megadva ID.";
}
$conn->close();
?>
