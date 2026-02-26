<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "przewozy";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    echo "Błąd połączenia";
}

$sql = "SELECT osoby.imie, osoby.nazwisko, osoby.telefon, zadania.zadanie, zadania.data FROM osoby JOIN zadania ON zadania.osoba_id = osoby.id_osoba";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["imie"] . " " . $row["nazwisko"] . $row["telefon"] . $row["zadanie"] . $row["data"] . "</li>";
    }
} else {
    echo "Brak wyników";
}

mysqli_close($conn);
