<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Przekątna 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Przekątna 1</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który dla podanej liczby całkowitej A oznaczającej ilość znaków w wierszu wyświetla następujący blok znaków.</p>
<form method="post" action="">
    Podaj liczbę A:
    <input type="number" name="a" min="1" required>
    <input type="submit" value="Wyświetl blok">
</form>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = htmlspecialchars($_POST['a']);

    if (!is_numeric($a) || intval($a) != $a || $a <= 0) {
        echo "<p>Podaj dodatnią liczbę całkowitą!</p>";
        exit;
    }
    $a = intval($a);
    echo "<p><b>A = $a</b></p>";
    for ($i = 0; $i < $a; $i++) {
        for ($j = 0; $j < $a; $j++) {
            if ($j == $i) {
                echo "<strong>1</strong>";
            } else {
                echo "0";
            }
        }
        echo "<br>";
    }
}
?>
</body>
</html>
