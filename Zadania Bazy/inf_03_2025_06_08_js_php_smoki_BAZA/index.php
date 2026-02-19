<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "smoki";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "Blad polaczenia.";
}

$sql = "SELECT nazwa, szerokosc, dlugosc FROM smok WHERE pochodzenie = 'Polska'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = $result -> fetch_assoc()) {
        echo "<li>" . "<b>" . $row["nazwa"] . "</b> " . $row["szerokosc"] . $row["dlugosc"] . "</li>";
    }
} else {
    echo "Brak wynikow.";
}
mysqli_close($conn);

