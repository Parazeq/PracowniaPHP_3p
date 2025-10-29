<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Punkt i prostokąt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Punkt i prostokąt</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który określi położenie punktu o współrzędnych (x, y) względem prostokąta wyznaczonego przez proste X=A, X=B, Y=C, Y=D, gdzie A< B i C< D. Program powinien przyjmować dane z formularza (współrzędne punktu oraz parametry prostokąta), weryfikować, czy są to liczby oraz czy A< B i C< D, a następnie wyświetlać dane wejściowe i wynik analizy w czytelny sposób (np. czy punkt leży wewnątrz, na krawędzi czy na zewnątrz prostokąta).

    Wskazówki dla ucznia:
    Sprawdź, czy wszystkie dane wejściowe są liczbami za pomocą is_numeric().
    Zweryfikuj warunki A< B i C< D, aby prostokąt był poprawnie zdefiniowany.
    Punkt leży wewnątrz prostokąta, jeśli x jest między A i B (A < x < B) oraz y jest między C i D (C < y < D).
    Punkt leży na krawędzi, jeśli x=A lub x=B albo y=C lub y=D (przy zachowaniu pozostałych warunków).
    Zabezpiecz dane wejściowe za pomocą htmlspecialchars(), aby uniknąć problemów z XSS.</p>
<form method="post" action="">
    <fieldset>
        <legend>Współrzędne punktu (x, y)</legend>
        x: <input type="number" name="x" step="any" required><br>
        y: <input type="number" name="y" step="any" required><br>
    </fieldset>

    <fieldset>
        <legend>Parametry prostokąta</legend>
        A (lewa krawędź): <input type="number" name="A" step="any" required><br>
        B (prawa krawędź): <input type="number" name="B" step="any" required><br>
        C (dolna krawędź): <input type="number" name="C" step="any" required><br>
        D (górna krawędź): <input type="number" name="D" step="any" required><br>
    </fieldset>

    <br>
    <input type="submit" value="Sprawdź położenie">
</form>

<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $x = htmlspecialchars($_POST['x']);
    $y = htmlspecialchars($_POST['y']);
    $A = htmlspecialchars($_POST['A']);
    $B = htmlspecialchars($_POST['B']);
    $C = htmlspecialchars($_POST['C']);
    $D = htmlspecialchars($_POST['D']);

    echo "<div class='result'>";
    echo "<h3>Wynik analizy:</h3>";

    if (!is_numeric($x) || !is_numeric($y) || !is_numeric($A) || !is_numeric($B) || !is_numeric($C) || !is_numeric($D)) {
        echo "<p class='error'>Błąd: Wszystkie wartości muszą być liczbami!</p>";
        echo "</div>";
        exit;
    }

    $x = (float)$x;
    $y = (float)$y;
    $A = (float)$A;
    $B = (float)$B;
    $C = (float)$C;
    $D = (float)$D;

    echo "<p><b>Punkt:</b> P($x, $y)</p>";
    echo "<p><b>Prostokąt:</b> A = $A, B = $B, C = $C, D = $D</p>";
    echo "<p><b>Opis:</b> prostokąt wyznaczony przez proste X = $A, X = $B, Y = $C, Y = $D</p>";

    if ($A >= $B) {
        echo "<p class='error'>Błąd: Warunek A < B nie jest spełniony! (A = $A, B = $B)</p>";
        echo "</div>";
        exit;
    }

    if ($C >= $D) {
        echo "<p class='error'>Błąd: Warunek C < D nie jest spełniony! (C = $C, D = $D)</p>";
        echo "</div>";
        exit;
    }

    $wynik = "";
    $na_krawedzi_x = ($x == $A || $x == $B);
    $na_krawedzi_y = ($y == $C || $y == $D);

    if ($na_krawedzi_x && $na_krawedzi_y) {
        $wynik = "Punkt leży w wierzchołku prostokąta";
    } elseif ($na_krawedzi_x && $y >= $C && $y <= $D) {
        $wynik = "Punkt leży na pionowej krawędzi prostokąta";
    } elseif ($na_krawedzi_y && $x >= $A && $x <= $B) {
        $wynik = "Punkt leży na poziomej krawędzi prostokąta";
    }
    elseif ($x > $A && $x < $B && $y > $C && $y < $D) {
        $wynik = "Punkt leży WEWNĄTRZ prostokąta";
    }
    else {
        $wynik = "Punkt leży NA ZEWNĄTRZ prostokąta";
    }

    echo "<p class='success'><b>Wynik:</b> $wynik</p>";
    echo "</div>";
}
?>
</body>
</html>