<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ułamki i piętra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ułamki i piętra</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<pre>Napisz program, który dla danej liczby całkowitej N wyświetla ciąg liczb w postaci ułamka zwykłego i dziesiętnego,
    prezentując wynik w specyficzny sposób. Na przykład dla N=3 program powinien wyświetlić:
    Piętro 1 > 1/1 - 1.000000
    Piętro 2 > > 1/2 - 0.500000
    Piętro 3 > > > 1/3 - 0.333333
    > > > > Koniec wspinaczki wracamy < < < <
    Piętro 3 > > >
    Piętro 2 > >
    Piętro 1 >
    Program powinien przyjmować N z formularza i weryfikować, czy jest to liczba całkowita dodatnia.

    Wskazówki dla ucznia:
    Sprawdź, czy N jest liczbą całkowitą dodatnią za pomocą is_numeric() i warunku N > 0.
    Użyj pętli for, aby wygenerować ułamki od 1/1 do 1/N.
    Oblicz ułamek dziesiętny za pomocą dzielenia (np. 1 / $i) i sformatuj go funkcją sprintf() do 6 miejsc po przecinku.
    Dodawaj znaki > zależnie od numeru piętra (np. w pętli zwiększaj ich liczbę), a potem odwracaj kolejność dla powrotu.
    Zabezpiecz dane wejściowe za pomocą htmlspecialchars(), aby uniknąć problemów z XSS.</pre>
<form method="post" action="">
    Podaj liczbę całkowitą dodatnią N:
    <input type="number" name="n" min="1" required>
    <input type="submit" value="Start">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $n = htmlspecialchars($_POST['n']);
    if (!is_numeric($n) || $n <= 0 || intval($n) != $n) {
        echo "<p style='color:red;'>N musi być dodatnią liczbą całkowitą!</p>";
        exit;
    }

    $n = intval($n);

    for ($i = 1; $i <= $n; $i++) {
        $g = str_repeat("> ", $i);
        $ulamek = "1/$i";
        $dzies = sprintf("%.6f", 1 / $i);
        echo "Piętro $i $g $ulamek - $dzies<br>";
    }

    echo str_repeat("> ", $n+1) . "Koniec wspinaczki wracamy " . str_repeat("< ", $n+1) . "<br>";

    for ($i = $n; $i >= 1; $i--) {
        $g = str_repeat("> ", $i);
        echo "Piętro $i $g<br>";
    }
}
?>
</body>
</html>
