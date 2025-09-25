<?php
$cookie_name = "userData";
$wiadomosc = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $imie = htmlspecialchars($_POST['imie']);
    $nazwisko = htmlspecialchars($_POST['nazwisko']);
    $urodziny = $_POST['urodziny'];

    $dane = [
        "imie" => $imie,
        "nazwisko" => $nazwisko,
        "urodziny" => $urodziny
    ];
    setcookie($cookie_name, json_encode($dane), time() + (86400 * 365), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_COOKIE[$cookie_name])) {
    $dane = json_decode($_COOKIE[$cookie_name], true);
    $imie = $dane['imie'];
    $nazwisko = $dane['nazwisko'];
    $urodziny = $dane['urodziny'];

    $dzis = new DateTime("today");
    $data_uro = DateTime::createFromFormat("Y-m-d", $urodziny);

    $data_uro->setDate((int)$dzis->format("Y"), (int)$data_uro->format("m"), (int)$data_uro->format("d"));

    if ($data_uro < $dzis) {
        $data_uro->modify("+1 year");
    }

    $dni = $dzis->diff($data_uro)->days;

    if ($dni == 0) {
        $wiadomosc = "Dziś są Twoje urodziny, $imie $nazwisko! Wszystkiego najlepszego!";
    } else {
        $wiadomosc = "Witaj $imie $nazwisko! Twoje urodziny będą za $dni dni.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dane użytkownika - Cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Formularz użytkownika</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Imię: <input type="text" name="imie" required></label><br><br>
    <label>Nazwisko: <input type="text" name="nazwisko" required></label><br><br>
    <label>Data urodzin: <input type="date" name="urodziny" required></label><br><br>
    <input type="submit" value="Zapisz dane">
</form>

<hr>
<?php if ($wiadomosc != ""): ?>
    <p><b><?= $wiadomosc ?></b></p>
<?php else: ?>
    <p>Nie wprowadzono jeszcze danych użytkownika.</p>
<?php endif; ?>

</body>
</html>
