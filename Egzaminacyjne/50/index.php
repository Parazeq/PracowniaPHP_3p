<?php
$polaczenie = mysqli_connect("localhost", "root", "", "medica");

if (!$polaczenie) {
    die("Błąd połączenia z bazą danych");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przychodnia Medica</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="icon" href="obraz2.png" type="image/png">
</head>
<body>
<header>
    <h1>Abonamenty w przychodni Medica</h1>
</header>
<article>
    <?php
    $zapytanie1 = "SELECT nazwa, cena, opis FROM abonamenty";
    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
    while ($wiersz = mysqli_fetch_assoc($wynik1)) {
        echo "<h3>Pakiet {$wiersz['nazwa']} - cena {$wiersz['cena']} zł</h3>";
        echo "<p>{$wiersz['opis']}</p>";
    }
    ?>
    <a href="opis.html">Dowiedz się więcej</a>
</article>
<main>
    <section>
        <h2>Standardowy</h2>
        <ul>
            <?php
            $zapytanie2 = "SELECT cecha FROM cechy WHERE id = 1";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz = mysqli_fetch_assoc($wynik2)) {
                echo "<li>{$wiersz['cecha']}</li>";
            }
            ?>
        </ul>
    </section>
    <section>
        <h2>Premium</h2>
        <ul>
            <?php
            $zapytanie3 = "SELECT cecha FROM cechy WHERE id = 2";
            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
            while ($wiersz = mysqli_fetch_assoc($wynik3)) {
                echo "<li>{$wiersz['cecha']}</li>";
            }
            ?>
        </ul>
    </section>
    <section>
        <h2>Dziecko</h2>
        <ul>
            <?php
            $zapytanie4 = "SELECT cecha FROM cechy WHERE id = 3";
            $wynik4 = mysqli_query($polaczenie, $zapytanie4);
            while ($wiersz = mysqli_fetch_assoc($wynik4)) {
                echo "<li>{$wiersz['cecha']}</li>";
            }
            ?>
        </ul>
    </section>
</main>
<footer>
    <p>
        <img src="obraz2.png" alt="przychodnia">
        Stronę przygotował: Jakub Kocur 3p/1
    </p>
</footer>
<?php
mysqli_close($polaczenie);
?>
</body>
</html>