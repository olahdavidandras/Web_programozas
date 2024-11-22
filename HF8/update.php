<?php
session_start();
require 'db_connection.php';

if (!isset($conn)) {
    die("Hiba: Nincs adatbázis kapcsolat!");
}


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $stmt = $conn->prepare(
        "UPDATE hallgatok SET name = :nev, szak = :szak, atlag = :atlag WHERE id = :id"
    );
    $stmt->bindParam(':nev', $nev);
    $stmt->bindParam(':szak', $szak);
    $stmt->bindParam(':atlag', $atlag);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: listazas.php");
    exit;
} else {
    $stmt = $conn->prepare("SELECT * FROM hallgatok WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Nev:<input type="Text" name="nev" value="<?php echo $row["name"]; ?>"><br>
    Szak:<input type="Text" name="szak" value="<?php echo $row["szak"]; ?>"><br>
    Atlag:<input type="Text" name="atlag"
                 value="<?php echo $row["atlag"]; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="Submit" name="submit" value="Elkuld">
</form>