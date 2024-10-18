<?php

?>

<form action="" method="post">
    <!-- Név -->
    <label for="name">Név:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST["name"] ?? '') ?>">
    <span class="error"><?= $errors["name"] ?? '' ?></span><br><br>

    <!-- E-mail -->
    <label for="email">E-mail cím:</label>
    <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? '') ?>">
    <span class="error"><?= $errors["email"] ?? '' ?></span><br><br>

    <!-- Jelszó -->
    <label for="password">Jelszó:</label>
    <input type="password" id="password" name="password">
    <span class="error"><?= $errors["password"] ?? '' ?></span><br><br>

    <!-- Jelszó megerősítése -->
    <label for="confirm_password">Jelszó megerősítése:</label>
    <input type="password" id="confirm_password" name="confirm_password">
    <span class="error"><?= $errors["confirm_password"] ?? '' ?></span><br><br>

    <!-- Születési dátum -->
    <label for="birthdate">Születési dátum:</label>
    <input type="date" id="birthdate" name="birthdate" value="<?= htmlspecialchars($_POST["birthdate"] ?? '') ?>">
    <span class="error"><?= $errors["birthdate"] ?? '' ?></span><br><br>

    <!-- Nem -->
    <label for="gender">Nem:</label>
    <input type="radio" id="male" name="gender"
           value="Férfi" <?= isset($_POST["gender"]) && $_POST["gender"] == 'Férfi' ? 'checked' : '' ?>> Férfi
    <input type="radio" id="female" name="gender"
           value="Nő" <?= isset($_POST["gender"]) && $_POST["gender"] == 'Nő' ? 'checked' : '' ?>> Nő
    <input type="radio" id="other" name="gender"
           value="Egyéb" <?= isset($_POST["gender"]) && $_POST["gender"] == 'Egyéb' ? 'checked' : '' ?>> Egyéb
    <span class="error"><?= $errors["gender"] ?? '' ?></span><br><br>

    <!-- Érdeklődési területek -->
    <label>Érdeklődési területek:</label>
    <input type="checkbox" name="interests[]"
           value="Sport" <?= isset($_POST["interests"]) && in_array("Sport", $_POST["interests"]) ? 'checked' : '' ?>>
    Sport
    <input type="checkbox" name="interests[]"
           value="Művészet" <?= isset($_POST["interests"]) && in_array("Művészet", $_POST["interests"]) ? 'checked' : '' ?>>
    Művészet
    <input type="checkbox" name="interests[]"
           value="Tudomány" <?= isset($_POST["interests"]) && in_array("Tudomány", $_POST["interests"]) ? 'checked' : '' ?>>
    Tudomány<br><br>

    <!-- Ország -->
    <label for="country">Ország:</label>
    <select name="country" id="country">
        <option value="">--Válassz--</option>
        <option value="Magyarország" <?= isset($_POST["country"]) && $_POST["country"] == 'Magyarország' ? 'selected' : '' ?>>
            Magyarország
        </option>
        <option value="Németország" <?= isset($_POST["country"]) && $_POST["country"] == 'Németország' ? 'selected' : '' ?>>
            Németország
        </option>
        <option value="USA" <?= isset($_POST["country"]) && $_POST["country"] == 'USA' ? 'selected' : '' ?>>USA</option>
    </select><br><br>

    <input type="submit" value="Regisztráció">
</form>