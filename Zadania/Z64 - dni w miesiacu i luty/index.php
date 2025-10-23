<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Liczba dni w miesiącu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Liczba dni w miesiącu</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<pre>Napisz program, który jak poprzednio, ale w przypadku lutego pyta dodatkowo o rok i dla lat przestępnych wyświetla 29 dni, a dla pozostałych 28.</pre>
<form method="post" action="">
    <label>Podaj numer miesiąca (1–12): </label>
    <input type="number" name="miesiac" min="1" max="12" required><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["miesiac"] == 2) {
        echo '<label>Podaj rok: </label>';
        echo '<input type="number" name="rok" min="1" required><br>';
    }
    ?>

    <input type="submit" value="Sprawdź">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $miesiac = (int)$_POST["miesiac"];
    $dni = 0;

    switch ($miesiac) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
        $dni = 31;
        break;
        case 4: case 6: case 9: case 11:
        $dni = 30;
        break;
        case 2:
            if (isset($_POST["rok"])) {
                $rok = (int)$_POST["rok"];
                if (($rok % 4 == 0 && $rok % 100 != 0) || ($rok % 400 == 0)) {
                    $dni = 29;
                } else {
                    $dni = 28;
                }
            } else {
                echo "<h3>Podaj rok, aby obliczyć dni w lutym.</h3>";
                exit;
            }
            break;
        default:
            echo "<h3>Nieprawidłowy numer miesiąca!</h3>";
            exit;
    }

    echo "<h2>Miesiąc nr $miesiac ma $dni dni.</h2>";
}
?>
</body>
</html>
