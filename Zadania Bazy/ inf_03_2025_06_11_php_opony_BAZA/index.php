<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "opony";

$polaczenie = mysqli_connect($host, $user, $pass, $db);
if ($polaczenie -> connect_error) {
    die("Zerwano połączenie: " . $polaczenie -> connect_error);
}

$sql = "SELECT z.id_zam, z.ilosc, o.model, o.cena FROM zamowienie z JOIN opony o ON z.id = o.nr_kat ORDER BY RAND() LIMIT 1;";

$result = mysqli_query($polaczenie, $sql);
if ($result -> num_rows > 0) {
    echo "<h2>RANDOM:</h2>";
    echo "<ul>";

    while ($row = $result -> fetch_assoc()) {
        echo "<li><b>Zamówienie:</b> {$row['id_zam']} | Ilość: {$row['ilosc']} | Model: {$row['model']} | Cena: {$row['cena']} zł</li>";
    }

    echo "</ul>";
} else {
    echo "Brak wyników";
}

mysqli_close($polaczenie);
?>