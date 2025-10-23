<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Równanie kwadratowe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Równanie kwadratowe</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który oblicza pierwiastki równania kwadratowego. Program dla danych A, B i C ma sprawdzać czy równanie jest kwadratowe, czy ma jeden czy dwa pierwiastki i czy ma rozwiązanie.</p>
<form method="post" action="">
    A: <input type="number" name="a" step="any" required><br><br>
    B: <input type="number" name="b" step="any" required><br><br>
    C: <input type="number" name="c" step="any" required><br><br>
    <input type="submit" value="Oblicz">
</form>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $c = floatval($_POST['c']);

    echo "<strong>Podane równanie:</strong> {$a}x<sup>2</sup> + {$b}x + {$c} = 0<br><br>";

    if ($a == 0) {
        echo "To nie jest równanie kwadratowe (A=0).<br>";
    } else {
        $delta = $b*$b - 4*$a*$c;
        echo "Δ = $delta<br>";
        if ($delta > 0) {
            $x1 = (-$b - sqrt($delta)) / (2*$a);
            $x2 = (-$b + sqrt($delta)) / (2*$a);
            echo "Równanie ma dwa pierwiastki rzeczywiste:<br>";
            echo "x<sub>1</sub> = $x1<br>";
            echo "x<sub>2</sub> = $x2<br>";
        } elseif ($delta == 0) {
            $x = -$b / (2*$a);
            echo "Równanie ma jeden pierwiastek podwójny:<br>";
            echo "x = $x<br>";
        } else {
            echo "Równanie nie ma pierwiastków rzeczywistych (Δ < 0).<br>";
        }
    }
}
?>
</body>
</html>
