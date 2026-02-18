<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "remonty";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "Błąd połączenia.";
}

$sql = "SELECT imie, cena FROM klienci JOIN zlecenia USING(id_klienta) WHERE miasto = 'Poznań' AND rodzaj = 'Malowanie';";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = $result -> fetch_assoc()) {
        echo "<li>" . $row["imie"] . " " . $row["cena"] . "</li>";
    }
} else {
    echo "Brak wynikow.";
}

mysqli_close($conn);
