<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tablica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Tablica n x m</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który wypełnia tablicę o wymiarach n x m, gdzie n<100 i m<100 - wartości n i m podaje użytkownik, a następnie wyświetla te liczby. Liczby należy wprowadzić do komponentu textarea oddzielone przecinkami. Program powinien zweryfikować, czy n i m są liczbami całkowitymi mniejszymi od 100, czy podane wartości są liczbami (całkowitymi lub rzeczywistymi), oraz czy ich liczba zgadza się z n x m, a następnie wyświetlić tablicę w czytelny sposób, np. w formie tabeli.</p>
<form method="post" action="">
    <label>Liczba wierszy (n < 100):</label><br>
    <input type="number" name="n" min="1" max="99" required><br><br>

    <label>Liczba kolumn (m < 100):</label><br>
    <input type="number" name="m" min="1" max="99" required><br><br>

    <label>Wartości tablicy (oddzielone przecinkami):</label><br>
    <textarea name="lista" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Wyświetl tablicę">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $n = htmlspecialchars($_POST['n']);
    $m = htmlspecialchars($_POST['m']);
    $lista = htmlspecialchars($_POST['lista']);

    if (!is_numeric($n) || intval($n) != $n || $n <= 0 || $n >= 100 ||
        !is_numeric($m) || intval($m) != $m || $m <= 0 || $m >= 100) {

        echo "<p>n i m muszą być dodatnimi liczbami całkowitymi mniejszymi od 100!</p>";
        exit;
    }

    $n = intval($n);
    $m = intval($m);
    $elementy = explode(",", $lista);
    $elementy = array_map('trim', $elementy);
    $ilosc = count($elementy);

    if ($ilosc != $n * $m) {
        echo "<p>Liczba podanych wartości ($ilosc) nie zgadza się z n × m = " . ($n*$m) . "!</p>";
        exit;
    }

    foreach ($elementy as $el) {
        if (!is_numeric($el)) {
            echo "<p'>Wszystkie wartości muszą być liczbami (całkowitymi lub rzeczywistymi)!</p>";
            exit;
        }
    }

    echo "<p><b>Wymiary tablicy: n = $n, m = $m</b></p>";
    echo "<p><b>Wprowadzone liczby:</b> " . implode(", ", $elementy) . "</p>";
    echo "<p><b>Tablica $n x $m:</b></p>";
    echo "<table>";

    $index = 0;
    for ($i = 0; $i < $n; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $m; $j++) {
            echo "<td>" . $elementy[$index] . "</td>";
            $index++;
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
