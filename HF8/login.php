
<?php
session_start();
require 'db_connection.php';

if (!isset($conn)) {
    die("Hiba: Nincs adatbázis kapcsolat!");
}

//username= admin es password= admin123
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (hash('sha256', $password) === $user['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: listazas.php");
            exit();
        } else {
            echo "Hibás jelszó!";
        }
    } else {
        echo "Nem létező felhasználó!";
    }

    $stmt->close();
}
$conn->close();
?>

<form method="POST" action="">
    <p>Felhasználónév:</p>
    <input type="text" name="username" required><br>
    <p>Jelszó:</p>
    <input type="password" name="password" required><br>
    <input type="submit" value="Bejelentkezés">
</form>
