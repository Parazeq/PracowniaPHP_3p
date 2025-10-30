<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Litery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Litery</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Napisz program, który odczytuje dwie wartości będące dużymi literami alfabetu angielskiego i wypisuje litery od pierwszej do drugiej.</p>
<form method="post" action="">
    Podaj pierwszy znak (A–Z):
    <input type="text" name="lit1" maxlength="1" required><br><br>
    Podaj drugi znak (A–Z):
    <input type="text" name="lit2" maxlength="1" required><br><br>
    <input type="submit" value="Pokaż litery">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lit1 = strtoupper(htmlspecialchars($_POST['lit1']));
    $lit2 = strtoupper(htmlspecialchars($_POST['lit2']));

    if (!ctype_alpha($lit1) || !ctype_alpha($lit2) || strlen($lit1) != 1 || strlen($lit2) != 1) {
        echo "<p>Podaj pojedyncze litery alfabetu (A–Z)!</p>";
        exit;
    }
    $kod1 = ord($lit1);
    $kod2 = ord($lit2);

    echo "<p>Pierwszy znak: <b>$lit1</b><br>Drugi znak: <b>$lit2</b></p>";

    if ($kod1 > $kod2) {
        $tmp = $kod1;
        $kod1 = $kod2;
        $kod2 = $tmp;
    }

    for ($i = $kod1; $i <= $kod2; $i++) {
        echo chr($i);
        if ($i < $kod2) echo ", ";
    }
}
?>
</body>
</html>
