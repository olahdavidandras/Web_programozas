<?php

?>

<form method="post" action="process.php">
    <label for="name">Név:</label>
    <input type="text" id="name" name="name">
    <br><br>

    <label for="email">E-mail cím:</label>
    <input type="text" id="email" name="email"">
    <br><br>

    <label for="password">Jelszó:</label>
    <input type="password" id="password" name="password">
    <br><br>

    <label for="confirm_password">Jelszó megerősítése:</label>
    <input type="password" id="confirm_password" name="confirm_password">
    <br><br>

    <label for="birthdate">Születési dátum:</label>
    <input type="date" id="birthdate" name="birthdate">
    <br><br>

    <label for="gender">Nem:</label> <br>
    <input type="radio" id="male" name="gender" value="Ferfi"> Férfi <br>
    <input type="radio" id="female" name="gender" value="No"> Nő<br><br>

    <label>Érdeklődési területek:</label> <br>
    <input type="checkbox" name="interests[]" value="Sport"> Sport <br>
    <input type="checkbox" name="interests[]" value="Matek"> Matek <br>
    <input type="checkbox" name="interests[]" value="Angol"> Angol<br><br>

    <label for="country">Ország:</label>
    <select name="country" id="country">
        <option value="">--Válassz--</option>
        <option value="Magyarorszag"> Magyarország</option>
        <option value="Romania">Románia</option>
        <option value="USA">USA</option>
    </select><br><br>

    <input type="submit" value="Regisztráció">
</form>