<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liczby Fibonacciego</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Liczby Fibonacciego</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który dla danej liczby całkowitej n wypisuje wyrazy ciągu Fibonacciego według zależności</p>
<img src="075.png">
<p>Dla n=20 program powinien wypisać: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765</p>
<form method="post" action="">
    Podaj n (liczba całkowita ≥ 0):
    <input type="number" name="n" min="0" required>
    <input type="submit" value="Generuj">
</form>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = htmlspecialchars($_POST['n']);
    if (!is_numeric($n) || $n < 0 || intval($n) != $n) {
        echo "<p>n musi być liczbą całkowitą nieujemną!</p>";
        exit;
    }

    $n = intval($n);
    $f = [];
    $f[0] = 0;
    $f[1] = 1;
    for ($i = 2; $i <= $n; $i++) {
        $f[$i] = $f[$i-1] + $f[$i-2];
    }
    for ($i = 0; $i <= $n; $i++) {
        echo "F($i) = " . $f[$i] . "<br>";
    }
}
?>
</body>
</html>
