<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
</header>
<section>
    <div style="width:80%;">
        <nav>
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </nav>
        <main>
            <img src="crested.jpg" alt="Świnka morska rasy crested">
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "hodowla";
            $connection = mysqli_connect($host, $user, $password, $database);
            $query2 = "
                SELECT DISTINCT s.data_ur, s.miot, r.rasa
                FROM swinki s
                JOIN rasy r ON s.rasy_id = r.id
                WHERE s.rasy_id = 7
            ";
            $result2 = mysqli_query($connection, $query2);
            while ($row = mysqli_fetch_assoc($result2)) {
                echo "<h2>Rasa: " . $row['rasa'] . "</h2>";
                echo "<p>Data urodzenia: " . $row['data_ur'] . "</p>";
                echo "<p>Oznaczenie miotu: " . $row['miot'] . "</p>";
            }
            echo "<hr>";
            echo "<h2>Świnki w tym miocie</h2>";
            $query3 = "
                SELECT imie, cena, opis
                FROM swinki
                WHERE rasy_id = 7
            ";
            $result3 = mysqli_query($connection, $query3);
            while ($row = mysqli_fetch_assoc($result3)) {
                echo "<h3>" . $row['imie'] . " - " . $row['cena'] . " zł</h3>";
                echo "<p>" . $row['opis'] . "</p>";
            }
            mysqli_close($connection);
            ?>
        </main>
    </div>
    <aside>
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
            $connection = mysqli_connect("localhost", "root", "", "hodowla");
            $query1 = "SELECT rasa FROM rasy";
            $result1 = mysqli_query($connection, $query1);
            while ($row = mysqli_fetch_assoc($result1)) {
                echo "<li>" . $row['rasa'] . "</li>";
            }
            mysqli_close($connection);
            ?>
        </ol>
    </aside>
</section>
<footer>
    <p>Stronę wykonał: Jakub Kocur 3p/1</p>
</footer>
</body>
</html>
