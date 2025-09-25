<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Koszyk zakupów</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Autor: Jakub Kocur 3p/1</h1>
<p><b>Lista artykułów</b></p>
<?php
if (isset($_POST['lista'])) {
    $koszyk = isset($_SESSION['koszyk']) ? unserialize($_SESSION['koszyk']) : [];
    $koszyk = array_unique(array_merge($koszyk, $_POST['lista']));
    $_SESSION['koszyk'] = serialize($koszyk);
    echo "<p>Wybrane produkty zostały umieszczone w koszyku.</p>";
}
?>
<form action="lista.php" method="post">
    <p>Wybór produktu:</p>
    <p>
        <select name="lista[]" multiple size="9">
            <option value="Monitor">Monitor</option>
            <option value="Drukarka">Drukarka</option>
            <option value="Klawiatura">Klawiatura</option>
            <option value="Myszka">Myszka</option>
            <option value="Głośniki">Głośniki</option>
            <option value="Kamera internetowa">Kamera internetowa</option>
            <option value="Słuchawki">Słuchawki</option>
            <option value="Stacja DVD">Stacja DVD</option>
            <option value="Dysk twardy">Dysk twardy</option>
            <option value="Pendrive">Pendrive</option>
            <option value="Komputer">Komputer</option>
        </select>
    </p>
    <p>Wybierz produkty, trzymając wciśnięty klawisz Ctrl.</p>
    <p><input type="submit" value="Wyślij"></p>
</form>
<p><a href="koszyk.php">Przejdź do koszyka</a></p>
</body>
</html>
