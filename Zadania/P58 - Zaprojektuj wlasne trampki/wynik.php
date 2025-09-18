<?php
if (isset($_GET['show'])) {
    echo "<p><b>Tryb podglądu włączony przez GET (show=1)</b></p>";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $description = htmlspecialchars($_POST['description']);
    $color = $_POST['color'] ?? "brak";
    $size = $_POST['size'] ?? "brak";

    $features = "brak";
    if (!empty($_POST['features'])) {
        $features = implode(", ", $_POST['features']);
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik - P58</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Wyniki formularza</h1>
</header>
<section class="container">
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <h2>Otrzymane dane z formularza:</h2>
        <p><b>Imię i nazwisko:</b> <?= $name ?></p>
        <p><b>E-mail:</b> <?= $email ?></p>
        <p><b>Telefon:</b> <?= $phone ?></p>
        <p><b>Opis butów:</b> <?= $description ?></p>
        <p><b>Kolor trampków:</b> <?= $color ?></p>
        <p><b>Wybrane opcje:</b> <?= $features ?></p>
        <p><b>Rozmiar:</b> <?= $size ?></p>
        <p><a href="index.php">Powrót do formularza</a></p>
    <?php else: ?>
        <p>Brak danych do wyświetlenia.</p>
        <p><a href="index.php">Wróć do formularza</a></p>
    <?php endif; ?>
</section>
</body>
</html>
