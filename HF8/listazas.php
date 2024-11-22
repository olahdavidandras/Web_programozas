<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

if (!isset($conn)) {
    die("Hiba: Nincs adatbázis kapcsolat!");
}

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
} else {
    echo "Sikeresen csatlakozva<br>";
}

$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);

echo "<a href='bevitel.php'>Új hallgató</a><br>";

if ($result->num_rows > 0) {
    echo "<table border='10'>";
    echo "<tr><th>ID</th><th>Name</th><th>Szak</th><th>Átlag</th><th>Műveletek</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["szak"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["atlag"]) . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Update</a> | ";
        echo "<a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nincs adat a táblában.";
}

// Kapcsolat lezárása
$conn->close();
?>
