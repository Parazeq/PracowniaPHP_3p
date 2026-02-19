<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "wyprawy";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn){
    echo "Błąd połączenia MySQL";
}

$sql = "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<li>" . $row["nazwa"] . " " . $row["cena"] . " " . $row["link_obraz"] ."</li>";
    }
} else {
    echo "Brak wyników";
}

mysqli_close($conn);
