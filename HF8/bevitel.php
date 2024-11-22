<?php
require 'db_connection.php';

if (!isset($conn)) {
    die("Hiba: Nincs adatbázis kapcsolat!");
}
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
} else {
    echo "Sikeresen csatlakozva<br>";
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['atlag']) && !empty($_POST['szak'])) {
        $name = $_POST['name'];
        $atlag = $_POST['atlag'];
        $szak = $_POST['szak'];

        $sql = "INSERT INTO hallgatok (name, szak, atlag) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssd", $name, $szak, $atlag);
            if ($stmt->execute()) {
                echo "Új rekord sikeresen létrehozva!";
            } else {
                echo "Hiba történt: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Hiba az előkészített utasítás létrehozásakor: " . $conn->error;
        }
    } else {
        echo "Nem töltöttél mindent ki!";
    }
}

$conn->close();
?>

<form method="POST" action="">
    <p>Név:</p>
    <input type="text" name="name" required><br>
    <p>Szak:</p>
    <input type="text" name="szak" required><br>
    <p>Átlag:</p>
    <input type="number" name="atlag" step="0.01" required><br>
    <input type="submit" name="submit" value="Elküld">
</form>
