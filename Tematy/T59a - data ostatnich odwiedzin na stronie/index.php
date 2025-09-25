<?php
$cookie_name = "wizyta";

if(isset($_COOKIE[$cookie_name])) {
    $ostatnia_wizyta = $_COOKIE[$cookie_name];
    echo "<p>Twoja ostatnia wizyta na stronie była: <b>$ostatnia_wizyta</b></p>";
} else {
    echo "<p>Witaj pierwszy raz na tej stronie!</p>";
}

$data = date("d-m-Y H:i:s");
setcookie($cookie_name, $data, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ostatnia wizyta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Obsługa ciasteczek w PHP</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Odśwież stronę, aby sprawdzić zapis daty ostatniej wizyty.</p>
</body>
</html>
