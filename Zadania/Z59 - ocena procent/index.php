<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ocena z procentu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ocena z procentu</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<pre>Napisz program, który dla podanego wyniku procentowego testów studenckich wystawia ocenę według następującej zasady:
    5 - 90% do 100%
    4,5 - 80% do 89%
    4 - 70% do 79%
    3,5 - 60% do 69%
    3 - 50% do 59%
    2 - poniżej 50%</pre>
<form method="post" action="">
    <label>Podaj wynik procentowy: </label>
    <input type="number" name="wynik" min="0" max="100" required> %
    <br>
    <input type="submit" value="Sprawdź ocenę">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wynik = (int)$_POST["wynik"];
    $ocena = 0;

    if ($wynik >= 90 && $wynik <= 100) {
        $ocena = "5.0";
    } elseif ($wynik >= 80) {
        $ocena = "4.5";
    } elseif ($wynik >= 70) {
        $ocena = "4.0";
    } elseif ($wynik >= 60) {
        $ocena = "3.5";
    } elseif ($wynik >= 50) {
        $ocena = "3.0";
    } elseif ($wynik < 50) {
        $ocena = "2.0";
    }
    echo "<h2>Twój wynik: $wynik% <br>Ocena: <b>$ocena</b></h2>";
}
?>
</body>
</html>
