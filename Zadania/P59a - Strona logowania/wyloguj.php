<?php
session_start();
if (isset($_SESSION['log'])) {
    unset($_SESSION['log']);
} else {
    header('location: loguj.php');
    exit;
}
$s = session_destroy();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title> Koniec_sesji</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Autor: Jakub Kocur 3p/1</h1>
<p>Wylogowałeś się ze strony.</p>
<a href="loguj.php">Logowanie</a>
</body>
</html>