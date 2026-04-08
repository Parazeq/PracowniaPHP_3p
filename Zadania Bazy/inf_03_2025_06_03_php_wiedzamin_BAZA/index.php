<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "biblioteka";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "Błąd połączenia z bazą: $database";
}

$sql = "SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5;";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["autor"] . ": " . $row["tytul"] . ": " . $row["kod"] . "<br>";
    }
} else {
    echo "Brak wyników";
}
mysqli_close($conn);