<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Zdjęcia</h1>
</header>
<section id="lewy">
    <h2>Tematy zdjęć</h2>
    <ol>
        <li>Zwierzęta</li>
        <li>Krajobrazy</li>
        <li>Miasta</li>
        <li>Przyroda</li>
        <li>Samochody</li>
    </ol>
</section>

<section id="srodkowy">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "galeria");

    $sql = "SELECT z.plik, z.tytul, z.polubienia, a.imie, a.nazwisko
            FROM zdjecia z
            JOIN autorzy a ON z.autorzy_id = a.id
            ORDER BY a.nazwisko ASC";

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='blok'>";
        echo "<img src='".$row['plik']."' alt='zdjęcie'>";
        echo "<h3>".$row['tytul']."</h3>";

        if($row['polubienia'] > 40) {
            echo "<p>Autor: ".$row['imie']." ".$row['nazwisko'].".<br>Wiele osób polubiło ten obraz</p>";
        } else {
            echo "<p>Autor: ".$row['imie']." ".$row['nazwisko']."</p>";
        }

        echo "<a href='".$row['plik']."' download>Pobierz</a>";
        echo "</div>";
    }

    mysqli_close($conn);
    ?>
</section>
<section id="prawy">
    <h2>Najbardziej lubiane</h2>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "galeria");
    $sql2 = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100";
    $result2 = mysqli_query($conn, $sql2);

    while($row = mysqli_fetch_assoc($result2)) {
        echo "<img src='".$row['plik']."' alt='".$row['tytul']."'>";
    }
    mysqli_close($conn);
    ?>
    <strong>Zobacz wszystkie nasze zdjęcia</strong>
</section>
<footer>
    <h5>Stronę wykonał: Jakub Kocur 3p/1</h5>
</footer>

</body>
</html>