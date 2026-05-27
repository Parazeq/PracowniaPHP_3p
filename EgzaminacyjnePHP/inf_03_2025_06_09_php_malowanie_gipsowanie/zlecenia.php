<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Malowanie i gipsowanie</h1>
</header>
<main>
    <nav>
        <a href="kontakt.html">Kontakt</a>
        <a href="https://remonty.pl" target="_blank">Partnerzy</a>
    </nav>
    <section class="lewa">
        <h2>Dla klientów</h2>
        <form action="zlecenia.php" method="post">
            <label>Ilu co najmniej pracowników potrzebujesz?</label><br>
            <input type="number" name="pracownicy">
            <input type="submit" name="szukaj" value="Szukaj firm"><br>
        </form>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "remonty";
        $conn = new mysqli($host, $user, $password, $dbname);
        if ($conn->connect_error) {
            echo "Brak połączenia z bazą";
        }

        if (isset($_POST['szukaj'])) {
                $pracownicy = $_POST['pracownicy'];
                $sql = "SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= $pracownicy ORDER BY liczba_pracownikow ASC";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<p>" . $row["nazwa_firmy"] . " " . $row["liczba_pracownikow"] . "</p>";
                    }
                } else {
                    echo "Brak wynikow.";
                }
            }
        ?>
    </section>
    <section class="srodkowy">
        <h2>Dla wykonawców</h2>
        <form action="zlecenia.php" method="post">
            <select name="miasto">
                <?php
                $conn = new mysqli($host, $user, $password, $dbname);
                if ($conn->connect_error) {
                    echo "Brak połączenia z bazą";
                }
                    $sql = "SELECT DISTINCT miasto FROM klienci ORDER BY miasto";

                    $result3 = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result3) > 0) {
                        while ($row = mysqli_fetch_assoc($result3)) {
                            echo "<option value='".$row['miasto']. "'>" . $row['miasto'] ."</option>";
                        }
                    }
                ?>
            </select><br>
            <input type="radio" name="wybor" value="malowanie" checked>Malowanie<br>
            <input type="radio" name="wybor" value="gipsowanie">Gipsowanie<br>
            <input type="submit" name="szukajK" value="Szukaj klientów"><br>
        </form>
        <ul>
            <?php
            $conn = new mysqli($host, $user, $password, $dbname);
            if ($conn->connect_error) {
                echo "Brak połączenia z bazą";
            }

            if (isset($_POST['szukajK'])) {
                $miasto = $_POST['miasto'];
                $rodzaj = $_POST['wybor'];

                $sql = "SELECT imie, cena FROM klienci JOIN zlecenia USING(id_klienta) WHERE miasto = '$miasto' AND rodzaj = '$rodzaj'";

                $result2 = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        echo "<li>" . $row["imie"] . " - " . $row["cena"] . "</li>";
                    }
                }
            }
            ?>
        </ul>
    </section>
    <aside>
        <img src="tapeta_lewa.png" alt="usługi">
        <img src="tapeta_prawa.png" alt="usługi">
        <img src="tapeta_lewa.png" alt="usługi">
    </aside>
</main>
<footer>
    <p><b>Stronę wykonał: Jakub Kocur 3p/1</b></p>
</footer>
</body>
</html>
<?php
$conn->close();
?>