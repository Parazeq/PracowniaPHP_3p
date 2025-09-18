<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>P58</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Zadanie P58 - Zaprojektuj własne trampki</h1>
    <h2>Autor: Jakub Kocur 3p/1</h2>
    <p><a href="wynik.php?show=1">Kliknij tutaj, aby włączyć tryb podglądu (GET)</a></p>
</header>
<section class="container">
    <h2>Formularz konkursu „Podrasuj swoje buty!”</h2>
    <form method="post" action="wynik.php">
        <h3>Podstawowe dane</h3>
        <label>Imię i nazwisko: <input type="text" name="name" required></label><br>
        <label>E-mail: <input type="email" name="email" required></label><br>
        <label>Telefon: <input type="tel" name="phone"></label><br>
        <label>Moje buty są TAKIE stare...<br>
            <textarea name="description" maxlength="300"></textarea>
        </label><br><br>

        <h3>Zaprojektuj własne trampki:</h3>
        <fieldset>
            <legend>Własny projekt butów</legend>
            <label>Kolor:</label><br>
            <input type="radio" name="color" value="czerwony"> czerwony<br>
            <input type="radio" name="color" value="niebieski"> niebieski<br>
            <input type="radio" name="color" value="czarny"> czarny<br>
            <input type="radio" name="color" value="srebrny"> srebrny<br><br>

            <label>Opcje (możesz wybrać kilka):</label><br>
            <input type="checkbox" name="features[]" value="Błyszczące sznurówki"> Błyszczące sznurówki<br>
            <input type="checkbox" name="features[]" value="Metalowe logo"> Metalowe logo<br>
            <input type="checkbox" name="features[]" value="Świecące podeszwy"> Świecące podeszwy<br>
            <input type="checkbox" name="features[]" value="Odtwarzanie MP3"> Odtwarzanie MP3<br>
        </fieldset><br>

        <label>Rozmiar:<br>
            <select name="size">
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37" selected>37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
            </select>
        </label>

        <br><br>
        <input type="submit" value="Podrasuj swoje buty!">
        <input type="reset" value="Resetuj">
    </form>
</section>
</body>
</html>
