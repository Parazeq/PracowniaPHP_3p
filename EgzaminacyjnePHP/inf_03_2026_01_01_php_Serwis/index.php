<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Serwis konfiguracji samochodów</h1>
</header>
<nav>
    <h2>Samochody</h2>
    <h2>Konfigurator</h2>
    <h2>Kontakt</h2>
</nav>
<main>
    <section id="lewy">
        <table>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "samochody");
            $sql = "SELECT pojazdy.marka, pojazdy.model, pojazdy.cena, kolory.nazwa, kolory.doplata FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id WHERE pojazdy.model = 'alfa';";
            $wynik = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($wynik)) {

                $calkowita = $row['cena'] + $row['doplata'];

                echo "<tr>";
                echo "<td>" . $row['marka'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['nazwa'] . "</td>";
                echo "<td>" . $calkowita . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <section id="srodek">
        <table>
            <tr>
                <th colspan="2">Konfiguracja</th>
                <th>Cena</th>
            </tr>
            <tr>
                <td colspan="3">
                    <img src="a1.jpg" alt="Konfiguracja 1">
                </td>
            </tr>
            <?php
            $sql2 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";

            $wynik2 = mysqli_query($conn, $sql2);
            $rekord1 = mysqli_fetch_array($wynik2);
            $rekord2 = mysqli_fetch_array($wynik2);

            echo "<tr>";
            echo "<td>Marka</td>";
            echo "<td>" . $rekord1['marka'] . "</td>";
            echo "<td>" . $rekord1['cena'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Model</td>";
            echo "<td>" . $rekord1['model'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
            ?>
            <tr>
                <td colspan="3">
                    <img src="a2.jpg" alt="Konfiguracja 2">
                </td>
            </tr>
            <?php
            echo "<tr>";
            echo "<td>Marka</td>";
            echo "<td>" . $rekord2['marka'] . "</td>";
            echo "<td>" . $rekord2['cena'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Model</td>";
            echo "<td>" . $rekord2['model'] . "</td>";
            echo "<td></td>";
            echo "</tr>";

            mysqli_close($conn);
            ?>
        </table>
    </section>
    <section id="prawy">
        <h3>111 222 444</h3>
        <img src="a3.png" alt="Samochód">
    </section>
</main>
<footer>
    <p>Stronę wykonał: Jakub Kocur 3p/1</p>
</footer>
</body>
</html>