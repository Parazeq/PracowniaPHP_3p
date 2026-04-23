<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "gry";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo "Błąd połączenia z bazą $database";
}

$sql = "INSERT INTO gry (nazwa, opis, zdjecie, punkty, cena) VALUES ('wartosc1', 'wartosc2', 55, 29.99, 'wartosc5');";

$result = mysqli_query($conn, $sql);
if ($conn->query($sql) === TRUE) {
    echo "Wstawiono rekord(y)";
} else {
    echo "Błąd: " . $conn->error;
}
mysqli_close($conn);