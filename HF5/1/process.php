<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $data = [];

    if (empty($_POST['firstName'])) {
        $errors[] = "Meg kell add a neved!";
    } else {
        $data['firstName'] = htmlspecialchars($_POST['firstName']);
    }

    if (empty($_POST['lastName'])) {
        $errors[] = "Meg kell add a vezetekneved!";
    } else {
        $data['lastName'] = htmlspecialchars($_POST['lastName']);
    }

    if (empty($_POST['email'])) {
        $errors[] = "Meg kell add az emailed!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Hibas email!";
    } else {
        $data['email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['attend'])) {
        $errors[] = "LEgalabb egy eventet ki kell valasz!";
    } else {
        $data['attend'] = $_POST['attend'];
    }

    if (isset($_FILES['abstract'])) {
        $temp = explode(".", $_FILES["abstract"]["name"]);
        $allowedExts = array("pdf");
        $extension = strtolower(end($temp));
        if (!in_array($extension, $allowedExts)) {
            $errors[] = "Csak PDF fájlok engedélyezettek.";
        }
        if ($_FILES["abstract"]["size"] > 3 * 1024 * 1024) {
            $errors[] = "A fájl mérete túl nagy. Maximum méret: 3MB.";
        }
    }


    if (empty($_POST['terms']) || $_POST['terms'] != 'accepted') {
        $errors[] = "Nem fogadtad el a felhasznaloi felteteleket!";
    }

    if (empty($errors)) {
        echo "<h3>Sikeres regisztralas</h3>";
        echo "<p><strong>Keresztnev:</strong> " . $data['firstName'] . "</p>";
        echo "<p><strong>Vezeteknev:</strong> " . $data['lastName'] . "</p>";
        echo "<p><strong>Email:</strong> " . $data['email'] . "</p>";
        echo "<p><strong>Eventek:</strong> " . implode(", ", $data['attend']) . "</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
