<?php
$db = mysqli_connect("localhost", "root", "", "3i_1_baza1");
$q = "SELECT imie, nazwisko FROM pracownicy";
$wynik = mysqli_query($db, $q);

while ($el = mysqli_fetch_row($wynik)) {
    if ($el[0] == "Jan") {
        echo $el[0] . " " . $el[1] . " " . "<br>";
    }
}