<link rel="stylesheet" href="style.css">
<h1>Autor: Jakub Kocur 3p/1</h1>
<p>Zdefiniuj klasę czołg. Czołg powinien mieć następujące właściwości:

    nazwa,
    kolor,
    ilość amunicji
    oraz metody:

    info() – wyświetlająca informację o czołgu,
    pomaluj() – zmieniająca kolor czołgu,
    załaduj() – zwiększająca ilość amunicji,
    strzelaj() – wyświetla komunikat i zmniejsza ilość amunicji o 1 (w wariancie rozwiniętym należy uniemożliwić wykonanie strzału jeśli nie ma amunicji).
    Utwórz obiekt klasy czołg i przetestuj działanie metod.</p>
<?php
class Czolg {
    public $nazwa;
    public $kolor;
    public $amunicja;

    function __construct($nazwa, $kolor, $amunicja = 0) {
        $this->nazwa = $nazwa;
        $this->kolor = $kolor;
        $this->amunicja = $amunicja;
    }

    function info() {
        echo "Czołg: $this->nazwa<br>";
        echo "Kolor: $this->kolor<br>";
        echo "Amunicja: $this->amunicja<br><br>";
    }

    function pomaluj($nowyKolor) {
        $this->kolor = $nowyKolor;
        echo "Czołg został przemalowany na kolor: $this->kolor<br>";
    }

    function zaladuj($ilosc) {
        $this->amunicja += $ilosc;
        echo "Załadowano $ilosc pocisków. Aktualna amunicja: $this->amunicja<br>";
    }

    function strzelaj() {
        if ($this->amunicja > 0) {
            $this->amunicja--;
            echo "Boom! Oddano strzał. Pozostała amunicja: $this->amunicja<br>";
        } else {
            echo "Brak amunicji – nie można strzelać!<br>";
        }
    }
}
$tygrys = new Czolg("Tygrys", "zielony", 2);

$tygrys->info();
$tygrys->strzelaj();
$tygrys->strzelaj();
$tygrys->strzelaj();
$tygrys->zaladuj(5);
$tygrys->pomaluj("kamuflaż");
$tygrys->info();
?>
