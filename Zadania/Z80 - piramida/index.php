<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Piramida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Piramida</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który dla podanej liczby całkowitej A wyświetla piramidę znaków | o ilości wierszy równej A (maksymalna dopuszczalna wartość A = 50).</p>
<form method="post" action="">
    Podaj liczbę A (1–50):
    <input type="number" name="a" min="1" max="50" required>
    <input type="submit" value="Wyświetl piramidę">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = htmlspecialchars($_POST['a']);
    if (!is_numeric($a) || intval($a) != $a || $a < 1 || $a > 50) {
        echo "<p>Podaj liczbę całkowitą z zakresu 1–50!</p>";
        exit;
    }

    $a = intval($a);
    echo "<p><b>Piramida o wysokości $a:</b></p>";
    for ($i = 1; $i <= $a; $i++) {
        echo str_repeat("|", $i) . "<br><br>";
    }
}
?>
</body>
</html>
