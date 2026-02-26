<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "biblioteka";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "Błąd połączenia";
}

$sql = "SELECT ksiazka.tytul, wypozyczenia.id_cz, wypozyczenia.data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY wypozyczenia.data_odd LIMIT 15;";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["tytul"] . ": " . $row["id_cz"] . ": " . $row["data_odd"] . "<br>";
    }
} else {
    echo "Brak wyników";
}
mysqli_close($conn);

