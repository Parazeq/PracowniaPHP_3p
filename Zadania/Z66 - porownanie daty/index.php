<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Porownanie dat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Porównanie dat</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<form method="post" action="">
    <fieldset>
        <legend>Data 1</legend>
        Dzień: <input type="number" name="d1" min="1" max="31" required><br>
        Miesiąc: <input type="number" name="m1" min="1" max="12" required><br>
        Rok: <input type="number" name="r1" min="1" required><br>
    </fieldset>
    <br>
    <fieldset>
        <legend>Data 2</legend>
        Dzień: <input type="number" name="d2" min="1" max="31" required><br>
        Miesiąc: <input type="number" name="m2" min="1" max="12" required><br>
        Rok: <input type="number" name="r2" min="1" required><br>
    </fieldset>
    <br>
    <input type="submit" value="Porównaj">
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $d1 = (int)htmlspecialchars($_POST['d1']);
    $m1 = (int)htmlspecialchars($_POST['m1']);
    $r1 = (int)htmlspecialchars($_POST['r1']);

    $d2 = (int)htmlspecialchars($_POST['d2']);
    $m2 = (int)htmlspecialchars($_POST['m2']);
    $r2 = (int)htmlspecialchars($_POST['r2']);

    if (!checkdate($m1, $d1, $r1)) {
        echo "<p>Data 1 jest niepoprawna!</p>";
        exit;
    }
    if (!checkdate($m2, $d2, $r2)) {
        echo "<p>Data 2 jest niepoprawna!</p>";
        exit;
    }

    echo "<p><b>Data 1:</b> $d1-$m1-$r1<br>";
    echo "<b>Data 2:</b> $d2-$m2-$r2</p>";
    $t1 = mktime(0,0,0, $m1,$d1,$r1);
    $t2 = mktime(0,0,0, $m2,$d2,$r2);

    if ($t1 < $t2) {
        echo "<p><b>Pierwsza data jest wcześniejsza.</b></p>";
    } elseif ($t1 > $t2) {
        echo "<p><b>Druga data jest wcześniejsza.</b></p>";
    } else {
        echo "<p><b>Obie daty są takie same.</b></p>";
    }
}
?>
</body>
</html>
