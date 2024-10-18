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


<h3>Online conference registration</h3>

<form method="post" action="">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="accepted">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

