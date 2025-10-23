<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>PDO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Zastosowanie biblioteki PDO</h1>
<h2>Autor: Jakub Kocur 3p/1</h2>
<p>Utwórz podobnie jak w ćwiczeniu 6.29 (z podręcznika) skrypt, który dane pobrane z formularza będzie dodawał w bazie 3p1_biblioteka (zaimportuj ją z załączonego pliku biblioteka.sql) do tabeli autorzy. W skrypcie zastosuj polecenia mysqli zorientowanego obiektowo.</p>
<div class="msg">
<form method="post" action="">
    <h3>Dodaj nowego autora</h3>
    <label>Imię: <input type="text" name="imie" required></label><br>
    <label>Nazwisko: <input type="text" name="nazwisko" required></label><br>
    <input type="submit" value="Dodaj autora">
</form>
<?php
$host = "localhost";
$dbname = "3p1_biblioteka";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $imie = htmlspecialchars($_POST['imie']);
        $nazwisko = htmlspecialchars($_POST['nazwisko']);

        $stmt = $pdo->prepare("INSERT INTO autorzy (imie, nazwisko) VALUES (:imie, :nazwisko)");
        $stmt->bindParam(':imie', $imie);
        $stmt->bindParam(':nazwisko', $nazwisko);

        if ($stmt->execute()) {
            echo "<p style='color:green;'><b>Dodano autora: $imie $nazwisko </b></p>";
        } else {
            echo "<p style='color:red;'>Błąd podczas dodawania autora!</p>";
        }
    }

    echo "<h3>Lista autorów:</h3>";
    $query = $pdo->query("SELECT * FROM autorzy ORDER BY id ASC");

    echo "<table>
            <tr><th>ID</th><th>Imię</th><th>Nazwisko</th></tr>";
    foreach ($query as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['imie']}</td>
                <td>{$row['nazwisko']}</td>
              </tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "<p style='color:red;'>Błąd połączenia z bazą: " . $e->getMessage() . "</p>";
}
?>
</div>
</body>
</html>
