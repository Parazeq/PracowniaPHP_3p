<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Od mniejszej do większej</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Od mniejszej do większej</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który dla podanych liczb całkowitych A i B wyświetla liczby od A do B, gdy A < B, lub od B do A, gdy B < A.</p>
<form method="post" action="">
    Podaj liczbę A: <input type="number" name="a" required><br><br>
    Podaj liczbę B: <input type="number" name="b" required><br><br>
    <input type="submit" value="Wyślij">
</form>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    if (!is_numeric($a) || !is_numeric($b)) {
        echo "<p>Podane wartości muszą być liczbami całkowitymi!</p>";
        exit;
    }
    $a = intval($a);
    $b = intval($b);

    if ($a < $b) {
        echo "<strong>A = </strong>" .$a. "<br>";
        echo "<strong>B = </strong>" .$b. "<br>";
        for ($i = $a; $i <= $b; $i++) {
            echo $i;
            if ($i < $b) echo ";";
        }
    } elseif ($b < $a) {
        echo "<strong>A = </strong>" .$a. "<br>";
        echo "<strong>B = </strong>" .$b. "<br>";
        for ($i = $b; $i <= $a; $i++) {
            echo $i;
            if ($i < $a) echo ";";
        }
    } else {
        echo "<strong>A = </strong>" .$a. "<br>";
        echo "<strong>B = </strong>" .$b. "<br>";
        echo "A i B są równe";
    }
}
?>
</body>
</html>
