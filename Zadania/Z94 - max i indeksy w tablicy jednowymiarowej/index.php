<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Max i indeksy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Max i indeksy w tablicy jednowymiarowej</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który wczytuje liczby całkowite do jednowymiarowej tablicy, wyświetla tę tablicę, wyświetla maksymalną wartość zapisaną w tablicy oraz wskaźniki elementów zawierających tę maksymalną wartość. Użytkownik wprowadza liczby do komponentu textarea oddzielone przecinkami. Program powinien zweryfikować, czy podane wartości są liczbami całkowitymi, a w odpowiedzi podać liczbę elementów, maksymalną wartość oraz indeksy elementów o tej wartości.</p>
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
    $indeksy = [];

    foreach ($elementy as $i => $val) {
        if ($val === $maxVal) {
            $indeksy[] = $i;
        }
    }

    echo "<p><b>Wprowadzone wartości:</b></p>";
    echo "<pre>";
    foreach ($elementy as $i => $val) {
        echo "tab[$i] = $val\n";
    }
    echo "</pre>";
    echo "<p><b>Liczba elementów:</b> $n</p>";
    echo "<p><b>Maksymalna wartość:</b> $maxVal</p>";
    echo "<p><b>Indeksy elementów z maksymalną wartością:</b> " . implode(", ", $indeksy) . "</p>";
}
?>
</body>
</html>