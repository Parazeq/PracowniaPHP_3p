<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
</header>
<main>
    <section id="blok1">
        <?php
        $conn = mysqli_connect("localhost","root","","kupauto");

        $sql1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10";
        $wynik1 = mysqli_query($conn,$sql1);

        while($row = mysqli_fetch_array($wynik1))
        {
            echo "<img src='".$row['zdjecie']."' alt='oferta dnia'>";
            echo "<h4>Oferta Dnia: Toyota ".$row['model']."</h4>";
            echo "<p>Rocznik: ".$row['rocznik'].", przebieg: ".$row['przebieg'].", rodzaj paliwa: ".$row['paliwo']."</p>";
            echo "<h4>Cena: ".$row['cena']."</h4>";
        }
        ?>
    </section>
    <section id="blok2">
        <h2>Oferty Wyróżnione</h2>
        <?php
        $sql2 = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE samochody.wyrozniony = 1";
        $wynik2 = mysqli_query($conn,$sql2);

        while($row = mysqli_fetch_array($wynik2))
        {
            echo "<div class='oferta'>";
            echo "<img src='".$row['zdjecie']."' alt='".$row['model']."'>";
            echo "<h4>".$row['nazwa']." ".$row['model']."</h4>";
            echo "<p>Rocznik: ".$row['rocznik']."</p>";
            echo "<h4>Cena: ".$row['cena']."</h4>";
            echo "</div>";
        }

        ?>
    </section>
    <section id="blok3">
        <h2>Wybierz markę</h2>
        <form method="POST">
            <select name="marka">
                <?php
                $sql3 = "SELECT nazwa FROM marki";
                $wynik3 = mysqli_query($conn,$sql3);

                while($row = mysqli_fetch_array($wynik3))
                {
                    echo "<option>".$row['nazwa']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Wyszukaj">
        </form>
        <?php
        if(isset($_POST['marka']))
        {
            $marka = $_POST['marka'];
            $sql4 = "SELECT samochody.model, samochody.cena, samochody.zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE marki.nazwa = '$marka'";
            $wynik4 = mysqli_query($conn,$sql4);

            while($row = mysqli_fetch_array($wynik4))
            {
                echo "<div class='oferta'>";
                echo "<img src='".$row['zdjecie']."' alt='".$row['model']."'>";
                echo "<h4>".$marka." ".$row['model']."</h4>";
                echo "<h4>Cena: ".$row['cena']."</h4>";
                echo "</div>";
            }
        }
        mysqli_close($conn);
        ?>
    </section>
</main>
<footer>
    <p>Stronę wykonał: Jakub Kocur 3p/1</p>
    <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
</footer>
</body>
</html>