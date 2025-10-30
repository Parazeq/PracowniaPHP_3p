<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Od A do B</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Od A do B</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który dla podanych liczb całkowitych A i B wyświetla wszystkie liczby całkowite z przedziału od A do B oddzielone średnikami.</p>
<form method="post" action="">
    Podaj liczbę A: <input type="number" name="a" required><br><br>
    Podaj liczbę B: <input type="number" name="b" required><br><br>
    <input type="submit" value="Pokaż przedział">
</form>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    if (!is_numeric($a) || !is_numeric($b)) {
        echo "<p>Podane wartości muszą być liczbami!</p>";
        exit;
    }

    $a = intval($a);
    $b = intval($b);
    if ($a > $b) {
        list($a, $b) = [$b, $a];
    }
    for ($i = $a; $i <= $b; $i++) {
        echo $i;
        if ($i < $b) echo ";";
    }
}
?>
</body>
</html>
