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
<h1>Tablica jednowymiarowa</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który wczytuje n liczb całkowitych do jednowymiarowej tablicy i wyświetla tę tablicę. Wartość n<100 podaje użytkownik. Liczby należy wprowadzić do komponentu textarea oddzielone przecinkami. Program powinien zweryfikować, czy n jest liczbą całkowitą mniejszą od 100, czy podane wartości są liczbami całkowitymi, oraz czy ich liczba zgadza się z n, a następnie wyświetlić tablicę w czytelny sposób.</p>
<form method="post" action="">
    <label>Liczba elementów n (mniej niż 100):</label><br>
    <input type="number" name="n" min="1" max="99" required><br><br>
    <label>Wartości tablicy (liczby całkowite oddzielone przecinkami):</label><br>
    <textarea name="lista" rows="4" cols="40" required></textarea><br><br>
    <input type="submit" value="Wyświetl tablicę">
</form>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = htmlspecialchars($_POST['n']);
    $lista = htmlspecialchars($_POST['lista']);
    if (!is_numeric($n) || intval($n) != $n || $n <= 0 || $n >= 100) {
        echo "<p> n musi być dodatnią liczbą całkowitą mniejszą od 100!</p>";
        exit;
    }

    $n = intval($n);
    $elementy = explode(",", $lista);
    $elementy = array_map('trim', $elementy);

    if (count($elementy) != $n) {
        echo "<p>Liczba podanych wartości (" . count($elementy) .
            ") nie zgadza się z n = $n!</p>";
        exit;
    }

    foreach ($elementy as $el) {
        if (!is_numeric($el) || intval($el) != $el) {
            echo "<p>Wszystkie wartości muszą być liczbami całkowitymi!</p>";
            exit;
        }
    }

    echo "<p><b>Liczba elementów: n = $n</b></p>";
    echo "<p><b>Wprowadzone liczby:</b> " . implode(", ", $elementy) . "</p>";

    echo "<p><b>Tablica jednowymiarowa ($n elementów):</b><br>";

    foreach ($elementy as $el) {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;$el&nbsp;&nbsp;";
    }

    echo "</p>";
}
?>
</body>
</html>
