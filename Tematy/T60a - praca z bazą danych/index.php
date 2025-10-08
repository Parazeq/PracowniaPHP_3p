<?php
$db = mysqli_connect("localhost", "root", "", "3p_1_baza_pracownikow");
if (!$db) {
    die("Błąd połączenia z bazą: " . mysqli_connect_error());
}

if (isset($_POST['utworz'])) {
    $sql = "CREATE TABLE IF NOT EXISTS pracownicy (
        id INT AUTO_INCREMENT PRIMARY KEY,
        imie VARCHAR(50),
        nazwisko VARCHAR(50),
        stanowisko VARCHAR(60),
        dzial VARCHAR(60),
        sekcja VARCHAR(60)
    )";
    if (mysqli_query($db, $sql)) {
        echo "<p>Tabela <b>pracownicy</b> została utworzona (jeśli nie istniała).</p>";
    } else {
        echo "<p>Błąd przy tworzeniu tabeli: " . mysqli_error($db) . "</p>";
    }
}

if (isset($_POST['zaladuj'])) {
    $plik = "pracownicy.txt";
    if (!file_exists($plik)) {
        echo "<p>Brak pliku <b>pracownicy.txt</b>.</p>";
    } else {
        $fp = fopen($plik, "r");
        $licznik = 0;
        while (!feof($fp)) {
            $linia = trim(fgets($fp));
            if ($linia == "") continue;

            $dane = preg_split("/[;,]+/", $linia);

            if (count($dane) >= 5) {
                $imie = mysqli_real_escape_string($db, $dane[0]);
                $nazwisko = mysqli_real_escape_string($db, $dane[1]);
                $stanowisko = mysqli_real_escape_string($db, $dane[2]);
                $dzial = mysqli_real_escape_string($db, $dane[3]);
                $sekcja = mysqli_real_escape_string($db, $dane[4]);

                $q = "INSERT INTO pracownicy (imie, nazwisko, stanowisko, dzial, sekcja)
                      VALUES ('$imie', '$nazwisko', '$stanowisko', '$dzial', '$sekcja')";
                mysqli_query($db, $q);
                $licznik++;
            }
        }
        fclose($fp);
        echo "<p>Załadowano $licznik rekordów do tabeli.</p>";
    }
}

if (isset($_POST['pokaz'])) {
    $wynik = mysqli_query($db, "SELECT * FROM pracownicy");
    if (mysqli_num_rows($wynik) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Stanowisko</th><th>Dział</th><th>Sekcja</th></tr>";
        while ($row = mysqli_fetch_assoc($wynik)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['imie']}</td>";
            echo "<td>{$row['nazwisko']}</td>";
            echo "<td>{$row['stanowisko']}</td>";
            echo "<td>{$row['dzial']}</td>";
            echo "<td>{$row['sekcja']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Brak danych w tabeli.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Baza pracowników</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Autor: Jakub Kocur 3p/1</h1>
<h2>Praca z bazą danych</h2>
<p>Tym razem zadanie jest bardziej złożone. Oto co należy zrobić:

    Utwórz bazę danych o nazwie 3p_1_baza_pracownikow.
    Do zadania dołączony został plik zawierający dane 114 pracowników - dokonaj konwersji tych danych do formaty txt (uzyskaj plik z danymi pracownicy.txt.
    Na utworzonej stronie projektu znajduje się przycisk "Utwórz tabelę", który w bazie 3p_1_baza_pracownikow tworzy tabelę pracownicy.
    Drugi przycisk "Załaduj dane" dodaje dane z pliku tekstowego pracownicy.txt do tabeli pracownicy.
    Trzeci przycisk wyświetla dane z tabeli pracownicy w postaci tabelarycznej.</p>

<form method="post" action="">
    <input type="submit" name="utworz" value="Utwórz tabelę">
    <input type="submit" name="zaladuj" value="Załaduj dane">
    <input type="submit" name="pokaz" value="Wyświetl dane">
</form>

</body>
</html>
