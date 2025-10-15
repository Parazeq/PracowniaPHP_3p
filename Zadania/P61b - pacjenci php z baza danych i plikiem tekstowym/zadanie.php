<?php
$db = mysqli_connect("localhost", "root", "", "3p_1_pacjenci");

if (!$db) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

if (file_exists("dane.txt")) {
    $plik = fopen("dane.txt", "r");
    $licznik = 0;

    while (!feof($plik)) {
        $linia = trim(fgets($plik));
        if ($linia == "") continue;

        $dane = explode(";", $linia);

        if (count($dane) >= 4) {
            $id = (int)$dane[0];
            $imie = mysqli_real_escape_string($db, $dane[1]);
            $nazwisko = mysqli_real_escape_string($db, $dane[2]);
            $email = mysqli_real_escape_string($db, $dane[3]);

            $sql = "INSERT IGNORE INTO tabela_1 (id, imie, nazwisko, email)
                    VALUES ('$id', '$imie', '$nazwisko', '$email')";
            mysqli_query($db, $sql);
            $licznik++;
        }
    }
    fclose($plik);
    echo "<p>Wczytano i zapisano $licznik rekordów z pliku dane.txt.</p>";
} else {
    echo "<p>Brak pliku dane.txt w folderze.</p>";
}

$wynik = mysqli_query($db, "SELECT * FROM tabela_1 ORDER BY id ASC");

if (mysqli_num_rows($wynik) > 0) {
    echo "<h2>Dane pacjentów:</h2>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Email</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($wynik)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['imie']}</td>
                <td>{$row['nazwisko']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Brak danych w tabeli.</p>";
}

mysqli_close($db);
?>
