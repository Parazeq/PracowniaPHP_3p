<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "rzeki";

$databaseConnection = mysqli_connect(
    $serverName,
    $userName,
    $password,
    $databaseName
);

if (!$databaseConnection) {
    die("Błąd połączenia z bazą danych");
}
?>
<header>
    <section class="baner">
        <img src="obraz1.png" alt="Mapa Polski">
    </section>
    <section class="baner">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </section>
</header>
<nav>
    <form method="post" action="">
        <label class="opcje">
            <input type="radio" name="filtr" value="all" checked>
            Wszystkie
        </label>
        <label class="opcje">
            <input type="radio" name="filtr" value="ostrze">
            Ponad stan ostrzegawczy
        </label>
        <label class="opcje">
            <input type="radio" name="filtr" value="alarm">
            Ponad stan alarmowy
        </label>
        <input type="submit" value="Pokaż">
    </form>
</nav>
<main>
    <section class="lewy">
        <h3>Stany na dzień 2022-05-05</h3>

        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>

            <?php
            $selectedFilter = "all";
            if (isset($_POST["filtr"])) {
                $selectedFilter = $_POST["filtr"];
            }

            $sqlQuery = "
                SELECT
                    w.nazwa,
                    w.rzeka,
                    w.stanOstrzegawczy,
                    w.stanAlarmowy,
                    p.stanWody
                FROM wodowskazy w
                JOIN pomiary p ON w.id = p.wodowskazy_id
                WHERE p.dataPomiaru = '2022-05-05'
            ";
            if ($selectedFilter == "ostrze") {
                $sqlQuery .= " AND p.stanWody > w.stanOstrzegawczy";
            }

            if ($selectedFilter == "alarm") {
                $sqlQuery .= " AND p.stanWody > w.stanAlarmowy";
            }
            $queryResult = mysqli_query($databaseConnection, $sqlQuery);
            while ($row = mysqli_fetch_assoc($queryResult)) {
                echo "<tr>";
                echo "<td>{$row['nazwa']}</td>";
                echo "<td>{$row['rzeka']}</td>";
                echo "<td>{$row['stanOstrzegawczy']}</td>";
                echo "<td>{$row['stanAlarmowy']}</td>";
                echo "<td>{$row['stanWody']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <section class="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php

        $averageQuery = "SELECT dataPomiaru, AVG(stanWody) AS averageWaterLevel FROM pomiary GROUP BY dataPomiaru";
        $averageResult = mysqli_query($databaseConnection, $averageQuery);
        while ($averageRow = mysqli_fetch_assoc($averageResult)) {
            echo "<p>{$averageRow['dataPomiaru']}: {$averageRow['averageWaterLevel']}</p>";
        }
        ?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a><br><br>
        <img src="obraz2.jpg" alt="rzeka">
    </section>
</main>
<footer>
    <p>Stronę wykonał: Jakub Kocur 3p</p>
</footer>
<?php
mysqli_close($databaseConnection);
?>
</body>
</html>
