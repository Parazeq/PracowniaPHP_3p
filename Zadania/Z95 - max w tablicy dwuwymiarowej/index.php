<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Max</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Max w tablicy dwuwymiarowej</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który wczytuje liczby całkowite do tablicy o wymiarach n x m, wyświetla tę tablicę i wyświetla maksymalną wartość zapisaną w tablicy. Użytkownik podaje n i m oraz wprowadza liczby do komponentu textarea oddzielone przecinkami. Program powinien zweryfikować, czy n i m są liczbami całkowitymi, czy podane wartości są liczbami całkowitymi, oraz czy ich liczba zgadza się z n x m, a następnie wyświetlić tablicę w czytelny sposób wraz z maksymalną wartością.</p>
<form method="post" action="">
    <label>Liczba wierszy (n):</label><br>
    <input type="text" name="n" required><br><br>

    <label>Liczba kolumn (m):</label><br>
    <input type="text" name="m" required><br><br>

    <label>Wartości tablicy (liczby całkowite oddzielone przecinkami):</label><br>
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
        !is_numeric($m) || intval($m) != $m || $m <= 0 || $m >= 100)
    {
        echo "<p>n i m muszą być dodatnimi liczbami całkowitymi mniejszymi od 100!</p>";
        exit;
    }

    $n = intval($n);
    $m = intval($m);
    $elementy = explode(",", $lista);
    $elementy = array_map('trim', $elementy);

    if (count($elementy) != $n * $m) {
        echo "<p>Liczba podanych wartości musi być równa n × m = ".($n*$m)."</p>";
        exit;
    }

    foreach ($elementy as $el) {
        if (!is_numeric($el) || intval($el) != $el) {
            echo "<p>Wszystkie wartości muszą być liczbami całkowitymi!</p>";
            exit;
        }
    }

    $elementy = array_map('intval', $elementy);
    $maxVal = max($elementy);
    $tab2D = [];
    $index = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $tab2D[$i][$j] = $elementy[$index++];
        }
    }

    echo "<p><b>Wymiary tablicy:</b> n = $n, m = $m</p>";
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
    echo "<p><b>Maksymalna wartość:</b> $maxVal</p>";
}
?>
</body>
</html>