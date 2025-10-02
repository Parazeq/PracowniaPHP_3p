<?php
$db = mysqli_connect("localhost", "root", "", "3i_1_baza1");
$q = "SELECT imie, nazwisko, stanowisko, dzial, sekcja FROM pracownicy";
$wynik = mysqli_query($db, $q);

while ($el = mysqli_fetch_row($wynik)) {
    if ($el[4] == "drukarki") {
        echo $el[0] . " " . $el[1] . " - " . $el[2] . " - dział: " . $el[3] . " " . $el[4]."<br>";
    }
}

mysqli_close($db);
?>
