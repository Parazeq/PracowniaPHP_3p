<?php
session_start();
if (!isset($_SESSION['log'])) {
    header('location: loguj.php');
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Strona główna</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$imie = ucfirst($_SESSION['log']);
echo "Witaj " . $imie;
?>
<h1>Autor: Jakub Kocur 3p/1</h1>
<p>Jesteś na stronie głównej.</p>
<p>Przed opuszczeniem strony wyloguj się!</p>
<a href="wyloguj.php">Wyloguj</a>
</body>
</html>