<?php
$db = mysqli_connect("localhost", "root", "", "3p_01_pracownicy_w_kolorze");

$q = "SELECT * FROM mock_data";
$wynik = mysqli_query($db, $q);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Pracownicy w kolorze</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Pracownicy w kolorze</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<pre>Korzystając ze strony https://mockaroo.com/ wygeneruj w SQL następujące dane 50 pracowników:

    id
    first_name
    last_name
    email
    gender
    ip_address
    color
    Wartość color powinna być wyrażona w liczbie szesnastkowej.

    Utwórz bazę danych 3p_01_pracownicy_w_kolorze.
    Zaimportuj dane z wygenerowanego pliku.
    Napisz skrypt php, który wyświetli dane pracowników na tle koloru zapisanego w kolumnie color.
    Jako rozwiązanie prześlij: wygenerowany plik sql, eksport bazy danych oraz skrypt php realizujący zadanie.</pre>
<table>
    <tr>
        <th>ID</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Kolor</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($wynik)) {
        $color = htmlspecialchars($row['color']);
        echo "<tr style='background-color: {$color};'>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['first_name']}</td>";
        echo "<td>{$row['last_name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$color}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
<?php
mysqli_close($db);
?>
