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
<h1>Max w tablicy jednowymiarowej</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który wczytuje liczby całkowite do jednowymiarowej tablicy, wyświetla tę tablicę i wyświetla maksymalną wartość zapisaną w tablicy. Użytkownik wprowadza liczby do komponentu textarea oddzielone przecinkami. Program powinien zweryfikować, czy podane wartości są liczbami całkowitymi, a w odpowiedzi podać liczbę elementów w tablicy oraz maksymalną wartość.</p>
<form method="post" action="">
    <label>Wartości tablicy (liczby całkowite oddzielone przecinkami):</label><br>
    <textarea name="lista" rows="4" cols="50" required></textarea><br><br>
    <input type="submit" value="Wyświetl dane">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lista = htmlspecialchars($_POST['lista']);
    $elementy = explode(",", $lista);
    $elementy = array_map('trim', $elementy);

    foreach ($elementy as $el) {
        if (!is_numeric($el) || intval($el) != $el) {
            echo "<p>Wszystkie wartości muszą być liczbami całkowitymi!</p>";
            exit;
        }
    }
    $elementy = array_map('intval', $elementy);
    $n = count($elementy);
    $maxVal = max($elementy);

    echo "<p><b>Wprowadzone wartości:</b> " . implode(", ", $elementy) . "</p>";
    echo "<p><b>Tablica jednowymiarowa ($n elementów):</b><br>";
    echo "<span class='box'>";
    foreach ($elementy as $v) {
        echo str_pad($v, 6, " ", STR_PAD_LEFT);
    }
    echo "</span></p>";
    echo "<p><b>Liczba elementów:</b> $n</p>";
    echo "<p><b>Maksymalna wartość:</b> $maxVal</p>";
}
?>
</body>
</html>