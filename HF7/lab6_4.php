<?php
if (!isset($_COOKIE['random_number'])) {
    $random_number = rand(1, 100);
    setcookie('random_number', $random_number, time() + 3600);
} else {
    $random_number = $_COOKIE['random_number'];
}

$message = '';

if (isset($_POST['guess'])) {
    $guess = intval($_POST['guess']);
    if ($guess == $random_number) {
        $message = 'Gratulálunk! Eltaláltad a számot!';

        $random_number = rand(1, 100);
        setcookie('random_number', $random_number, time() + 3600);
    } elseif ($guess < $random_number) {
        $message = 'A tipped kisebb a kereset számnál!';
    } else {
        $message = 'A tipped nagyobb a kereset számnál!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Számkitaláló</title>
</head>
<body>
<h1>Találd ki a számot!</h1>
<p><?php echo $message; ?></p>
<form method="post">
    <input type="number" name="guess" min="1" max="100" required>
    <button type="submit">Tipp</button>
</form>
</body>
</html>
