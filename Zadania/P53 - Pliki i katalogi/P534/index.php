<?php
$liczby = file("napisy.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($liczby as $nr => $bin) {
    $dec = bindec($bin);
    echo ($nr + 1) . " – " . $bin . " – " . $dec . "<br>";
}
