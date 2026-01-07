<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suma</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Suma w wierszu tablicy</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który wczytuje liczby do tablicy o wymiarach n x m i oblicza sumę wartości we wskazanym wierszu. Numer wiersza podaje użytkownik (numerowanie od 0). Użytkownik wprowadza n, m, liczby do komponentu textarea oddzielone przecinkami oraz numer wiersza. Program powinien zweryfikować, czy n, m i numer wiersza są liczbami całkowitymi, czy podane wartości są liczbami, czy ich liczba zgadza się z n x m, a następnie wyświetlić tablicę i sumę wartości w wybranym wierszu.</p>
<form method="post" action="">
    <label>Liczba wierszy (n):</label><br>
    <input type="text" name="n" required><br><br>

    <label>Liczba kolumn (m):</label><br>
    <input type="text" name="m" required><br><br>

    <label>Numer wiersza (0 do n-1):</label><br>
    <input type="text" name="wiersz" required><br><br>

    <label>Wartości tablicy (liczby oddzielone przecinkami):</label><br>
    <textarea name="lista" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Oblicz sumę wiersza">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $n      = htmlspecialchars($_POST['n']);
    $m      = htmlspecialchars($_POST['m']);
    $wiersz = htmlspecialchars($_POST['wiersz']);
    $lista  = htmlspecialchars($_POST['lista']);

    if (!is_numeric($n) || intval($n) != $n || $n <= 0 ||
        !is_numeric($m) || intval($m) != $m || $m <= 0 ||
        !is_numeric($wiersz) || intval($wiersz) != $wiersz)
    {
        echo "<p>n, m i numer wiersza muszą być liczbami całkowitymi!</p>";
        exit;
    }

    $n = intval($n);
    $m = intval($m);
    $wiersz = intval($wiersz);

    if ($wiersz < 0 || $wiersz >= $n) {
        echo "<p>Numer wiersza musi być w zakresie od 0 do ".($n-1).".</p>";
        exit;
    }

    $elementy = explode(",", $lista);
    $elementy = array_map('trim', $elementy);
    $wymagane = $n * $m;

    if (count($elementy) != $wymagane) {
        echo "<p>Liczba elementów musi wynosić n × m = $wymagane.</p>";
        exit;
    }

    foreach ($elementy as $el) {
        if (!is_numeric($el) || intval($el) != $el) {
            echo "<p> Wszystkie wartości muszą być liczbami całkowitymi!</p>";
            exit;
        }
    }

    $elementy = array_map('intval', $elementy);
    $tab2D = [];
    $idx = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $tab2D[$i][$j] = $elementy[$idx++];
        }
    }

    $suma = array_sum($tab2D[$wiersz]);

    echo "<p><b>Wymiary tablicy:</b> n = $n, m = $m</p>";
    echo "<p><b>Numer wiersza:</b> $wiersz</p>";
    echo "<p><b>Wprowadzone liczby:</b> ".implode(", ", $elementy)."</p>";

    echo "<p><b>Tablica $n × $m:</b></p>";
    echo "<table>";
    for ($i = 0; $i < $n; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $m; $j++) {
            echo "<td>".$tab2D[$i][$j]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<p><b>Suma wartości w wierszu $wiersz:</b> $suma</p>";
}
?>
</body>
</html>