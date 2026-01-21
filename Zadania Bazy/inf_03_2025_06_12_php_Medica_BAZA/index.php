<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "medica";

$polaczenie = mysqli_connect($host, $user, $pass, $db);
if ($polaczenie -> connect_error) {
    die("Zerwano połączenie: " . $polaczenie -> connect_error);
}

$sql = "SELECT a.nazwa, c.cecha FROM abonamenty a JOIN SzczegolyAbonamentu s ON a.id = s.Abonamenty_id JOIN Cechy c ON s.Cechy_id = c.id WHERE a.id = 1;";

$result = mysqli_query($polaczenie, $sql);
if ($result -> num_rows > 0) {
    echo "<h2>Abonament ID = 1:</h2>";
    echo "<ul>";

    while ($row = $result -> fetch_assoc()) {
        echo "<li>" . "<b>" . $row["nazwa"] . "</b> " . $row["cecha"] . "</li>";
    }

    echo "</ul>";
} else {
    echo "Brak wyników";
}

mysqli_close($polaczenie);
?>