<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>SZKOLENIA</h1>
</header>
<main>
    <section class="lewa">
        <table>
            <tr>
                <th>Kurs</th>
                <th>Nazwa</th>
                <th>Cena</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost","root","","szkolenia");
            $sql = "SELECT kod, nazwa, cena FROM kursy";
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td><img src='".$row['kod'].".jpg' alt='kurs'></td>";
                echo "<td>".$row['nazwa']."</td>";
                echo "<td>".$row['cena']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <section class="prawa">
        <h2>Zapisy na kursy</h2>
        <form method="post">
            <label>Imię</label><br>
            <input type="text" name="imie"><br>
            <label>Nazwisko</label><br>
            <input type="text" name="nazwisko"><br>
            <label>Wiek</label><br>
            <input type="number" name="wiek"><br>
            <label>Rodzaj kursu</label><br>
            <select name="kurs">
                <?php
                $sql2 = "SELECT nazwa FROM kursy";
                $result2 = mysqli_query($conn,$sql2);

                while($row2 = mysqli_fetch_array($result2)){
                    echo "<option>".$row2['nazwa']."</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Dodaj dane">
        </form>
        <?php
        if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['wiek'])){
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $wiek = $_POST['wiek'];
            if($imie != "" && $nazwisko != "" && $wiek != ""){
                $sql3 = "INSERT INTO uczestnicy(imie,nazwisko,wiek) VALUES('$imie','$nazwisko','$wiek');";
                mysqli_query($conn,$sql3);
                echo "<p>Dane uczestnika $imie $nazwisko zostały dodane</p>";
            }
            else{
                echo "<p>Wprowadź wszystkie dane</p>";
            }

        }
        mysqli_close($conn);
        ?>
    </section>
</main>

<footer>
    <p>Stronę wykonał: Jakub Kocur 3p/1</p>
</footer>
</body>
</html>