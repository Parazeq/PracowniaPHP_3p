<?php
session_start();

$komunikat = "";

if (isset($_SESSION['log'])) {
    header('Location: strona.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nazwa = $_POST['nazwa'] ?? "";
    $haslo = $_POST['haslo'] ?? "";

    if ($nazwa === 'janek' && $haslo === 'jan23') {
        $_SESSION['log'] = $nazwa;
        header('Location: strona.php');
        exit();
    } else {
        $komunikat = "Nieprawidłowe dane logowania";
    }
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Autoryzacja danych</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
    <h1>Autor: Jakub Kocur 3p/1</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <p id="log">Logowanie</p>
        <?php if ($komunikat): ?>
            <p style="color:red;"><b><?php echo $komunikat; ?></b></p>
        <?php endif; ?>
        <p class="fo">Nazwa użytkownika:</p>
        <input type="text" name="nazwa" size="25" required><br>
        <p class="fo">Hasło:</p>
        <input type="password" name="haslo" size="25" required>
        <br><br>
        <input type="submit" value="Zaloguj się">
    </form>
</div>
</body>
</html>
