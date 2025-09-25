<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Koszyk</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Autor: Jakub Kocur 3p/1</h1>
<p><b>Zawartość koszyka</b></p>
<?php
if (isset($_SESSION['koszyk'])) {
    $koszyk = unserialize($_SESSION['koszyk']);
    if (!empty($koszyk)) {
        echo "<ul>";
        foreach ($koszyk as $produkt) {
            echo "<li>" . htmlspecialchars($produkt) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Koszyk jest pusty.</p>";
    }
} else {
    echo "<p>Brak sesji (koszyk jeszcze nie istnieje).</p>";
}
?>
<p><a href="lista.php">Przejdź do listy produktów</a></p>
</body>
</html>
