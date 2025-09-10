<?php
touch("imiona.txt");
$im = "Jan
Anna
Piotr
Maria
Kamil
Ewa
Tomasz";
file_put_contents("imiona.txt", $im);
$imiona = file("imiona.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

echo "<h3>Imiona w kolejności zapisania:</h3>";
foreach ($imiona as $imie) {
    echo $imie . "<br>";
}

echo "<h3>Imiona w kolejności odwrotnej:</h3>";
for ($i = count($imiona) - 1; $i >= 0; $i--) {
    echo $imiona[$i] . "<br>";
}

