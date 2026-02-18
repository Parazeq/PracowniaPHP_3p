<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "remonty";

$polaczenie = mysqli_connect($host, $user, $pass, $db);
if ($polaczenie -> connect_error) {
    die("Zerwano połączenie: " . $polaczenie -> connect_error);
}

$sql = "SELECT imie, cena FROM klienci JOIN zlecenia USING(id_klienta) WHERE miasto = 'Poznań' AND rodzaj = 'Malowanie';";

$result = mysqli_query($polaczenie, $sql);
if ($result -> num_rows > 0) {
    echo "<ul>";

    while ($row = $result -> fetch_assoc()) {
        echo "<li>" . "<b>" . $row["imie"] . "</b> " . $row["cena"] . "</li>";
    }

    echo "</ul>";
} else {
    echo "Brak wyników";
}

mysqli_close($polaczenie);
?>