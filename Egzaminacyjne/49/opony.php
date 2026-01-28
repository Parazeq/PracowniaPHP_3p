<?php
header("Refresh:10");
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>OPONY</h1>
</header>
<main>
    <aside>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "opony");
        if (!$polaczenie) {
            die("Błąd połączenia z bazą");
        }
        $zapytanie1 = "SELECT * FROM opony ORDER BY cena ASC LIMIT 10";
        $wynik1 = mysqli_query($polaczenie, $zapytanie1);

        while ($wiersz = mysqli_fetch_assoc($wynik1)) {
            $sezon = $wiersz["sezon"];
            if ($sezon == "letnia") $obraz = "lato.png";
            elseif ($sezon == "zimowa") $obraz = "zima.png";
            else $obraz = "uniwer.png";

            echo "<div class='opona'>";
            echo "<img src='$obraz' alt='sezon'>";
            echo "<h4>Opona: {$wiersz['producent']} {$wiersz['model']}</h4>";
            echo "<h3>Cena: {$wiersz['cena']}</h3>";
            echo "</div>";
        }
        ?>
        <p><a href="https://opona.pl/">więcej ofert</a></p>
    </aside>
    <div id="sekcje">
    <section id="sekcja1">
        <img src="opona.png" alt="Opona">
        <h2>Opona dnia</h2>
        <?php
        $zapytanie2 = "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        if ($wiersz = mysqli_fetch_assoc($wynik2)) {
            echo "<h2>{$wiersz['producent']} model {$wiersz['model']}</h2>";
            echo "<h2>Sezon: {$wiersz['sezon']}</h2>";
            echo "<h2>Tylko {$wiersz['cena']} zł!</h2>";
        }
        ?>
    </section>
    <section id="sekcja2">
        <h2>Najnowsze zamówienie</h2>
        <?php
        $zapytanie3 = "SELECT z.id_zam, z.ilosc, o.model, o.cena
                       FROM zamowienie z
                       JOIN opony o ON z.id = o.nr_kat
                       ORDER BY RAND() LIMIT 1";

        $wynik3 = mysqli_query($polaczenie, $zapytanie3);
        if ($wiersz = mysqli_fetch_assoc($wynik3)) {
            $wartosc = $wiersz["ilosc"] * $wiersz["cena"];

            echo "<h2>{$wiersz['id_zam']} {$wiersz['ilosc']} sztuki modelu {$wiersz['model']}</h2>";
            echo "<h2>Wartość zamówienia $wartosc zł</h2>";
        }
        mysqli_close($polaczenie);
        ?>
    </section>
    </div>
</main>
<footer>
    <p>Stronę wykonał: Jakub Kocur 3p/1</p>
</footer>
</body>
</html>
