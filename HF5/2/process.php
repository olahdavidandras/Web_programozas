<?php
$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors[] = "Nem adtad meg a neved!";
} else {
    $data['name'] = htmlspecialchars($_POST['name']);
}

if (empty($_POST['email'])) {
    $errors[] = "Add meg az email cimed!";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Helytelen emailt adtal meg!";
} else {
    $data['email'] = htmlspecialchars($_POST['email']);
}

if (empty($_POST['password'])) {
    $errors[] = "Add meg a jelszot!";
} elseif (strlen($_POST['password']) < 8 ||
    !preg_match('/[A-Z]/', $_POST['password']) ||
    !preg_match('/[0-9]/', $_POST['password']) ||
    !preg_match('/[\W]/', $_POST['password'])) {
    $errors[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie, és tartalmaznia kell 1 nagybetűt, számot és speciális karaktert.";
}

if ($_POST['password'] !== $_POST['confirm_password']) {
    $errors[] = "Nem egyezik meg a 2 jelszo!";
}

if (empty($_POST['birthdate'])) {
    $errors[] = "Add meg a szuletesi datumod!";
} elseif (!strtotime($_POST['birthdate'])) {
    $errors[] = "Nem jo datum!";
} else {
    $data['birthdate'] = htmlspecialchars($_POST['birthdate']);
}

if (empty($_POST['gender'])) {
    $errors[] = "Valassz egy nemet!";
} else {
    $data['gender'] = htmlspecialchars($_POST['gender']);
}

if (!empty($_POST['interests'])) {
    $data['interests'] = array_map('htmlspecialchars', $_POST['interests']);
} else {
    $data['interests'] = "Nincs megadva.";
}

if (!empty($_POST['country'])) {
    $data['country'] = htmlspecialchars($_POST['country']);
} else {
    $data['country'] = "Nincs megadva.";
}

if (!empty($errors)) {
    echo "<h2>Hibák az űrlap beküldésekor:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
} else {
    echo "<h2>Regisztracio sikeres! A megadott adatok:</h2>";
    echo "<ul>";
    echo "<li><strong>Nev:</strong> " . $data['name'] . "</li>";
    echo "<li><strong>E-mail:</strong> " . $data['email'] . "</li>";
    echo "<li><strong>Szuletesi datum:</strong> " . $data['birthdate'] . "</li>";
    echo "<li><strong>Nem:</strong> " . $data['gender'] . "</li>";
    echo "<li><strong>Erdeklodesi teruletek:</strong> " . implode(", ", (array)$data['interests']) . "</li>";
    echo "<li><strong>Orszag:</strong> " . $data['country'] . "</li>";
    echo "</ul>";
}
?>
