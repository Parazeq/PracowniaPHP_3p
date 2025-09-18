<link rel="stylesheet" href="style.css">
<h1>Autor: Jakub Kocur 3p/1</h1>
<p>Pobierz kod z repozytorium https://github.com/tadeuszgraczyk "2024_programowanie_PHP". Zmodyfikuj klasę  Osoba dodając pole wiek. Przetestuj swój zmodyfikowany kod.</p>
<?php
class Osoba
{
    public $id, $nazwisko, $imie, $wiek;

    function wpiszNazwisko($arg1)
    {
        $this->nazwisko = $arg1;
    }
    function pobierzNazwisko()
    {
        return $this->nazwisko;
    }

    function wpiszImie($arg2)
    {
        $this->imie = $arg2;
    }
    function pobierzImie()
    {
        return $this->imie;
    }

    function wpiszId($arg3)
    {
        $this->id = $arg3;
    }
    function pobierzId()
    {
        return $this->id;
    }

    function wpiszWiek($arg4)
    {
        $this->wiek = $arg4;
    }
    function pobierzWiek()
    {
        return $this->wiek;
    }
}

$os1 = new Osoba();
$os1->wpiszId(1);
$os1->wpiszImie("Jan");
$os1->wpiszNazwisko("Kowalski");
$os1->wpiszWiek(26);
$os2 = new Osoba();
$os2->wpiszId(2);
$os2->wpiszImie("Andrzej");
$os2->wpiszNazwisko("Nowak");
$os2->wpiszWiek(43);

echo "ID: " . $os1->pobierzId() . "<br>";
echo "Imię: " . $os1->pobierzImie() . "<br>";
echo "Nazwisko: " . $os1->pobierzNazwisko() . "<br>";
echo "Wiek: " . $os1->pobierzWiek() . "<br>";
echo "ID: " . $os2->pobierzId() . "<br>";
echo "Imię: " . $os2->pobierzImie() . "<br>";
echo "Nazwisko: " . $os2->pobierzNazwisko() . "<br>";
echo "Wiek: " . $os2->pobierzWiek() . "<br>";
?>
