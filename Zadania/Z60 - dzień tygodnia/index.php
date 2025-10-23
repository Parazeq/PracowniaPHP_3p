<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Z60</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Dzień tygodnia</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który dla podanej liczby całkowitej z przedziału od 1 do 7 wypisuje jaki to dzień tygodnia. Zakładamy, że 1 to poniedziałek. W przypadku liczby z poza zakresu należy wyświetlić informację o błędzie.</p>
<form method="post" action="">
    <label>Podaj liczbe calkowita </label>
    <input type="text" name="liczba" required>
    <br>
    <input type="submit" value="Sprawdź">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liczba = (int)$_POST["liczba"];
    $dzien = 0;

    switch ($liczba) {
        case 1:
            $dzien = "Poniedziałek";
            break;
        case 2:
            $dzien = "Wtorek";
            break;
        case 3:
            $dzien = "Środa";
            break;
        case 4:
            $dzien = "Czwartek";
            break;
        case 5:
            $dzien = "Piątek";
            break;
        case 6:
            $dzien = "Sobota";
            break;
        case 7:
            $dzien = "Niedziela";
            break;
        default:
            $dzien = "Nie ma takiego dnia!";
    }
    echo "<h2>Podana liczba to: $liczba <br>Dzień tygodnia to: <b>$dzien</b></h2>";
}
?>
</body>
</html>
