<?php
    $tekst = "W TYM ROKU NARODOWE CZYTANIE POD HONOROWYM PATRONATEM PARY PREZYDENCKIEJ ODBĘDZIE SIĘ 08.09.2018 R. W STULECIE ODZYSKANIA NIEPODLEGŁOŚCI WYBRANO POWIEŚĆ STEFANA ŻEROMSKIEGO „PRZEDWIOŚNIE”.
    WŁĄCZAJĄC SIĘ DO OGÓLNOPOLSKIEJ AKCJI, ZAPRASZAMY DO WSPÓLNEGO CZYTANIA W NASZEJ SZKOLE W PRZEDDZIEŃ TEGO WYDARZENIA 07.09.2018 R.
    NA DRUGIEJ GODZINIE LEKCYJNEJ W AULI SZKOLNEJ. CZYTAĆ BĘDĄ UCZNIOWIE KLASY 2M.
    FORMUŁA SPOTKANIA NIE JEST ZAMKNIĘTA – KAŻDY MOŻE PRZYŁĄCZYĆ SIĘ DO CZYTANIA LUB SŁUCHANIA.";
    touch("narodoweCzytanie.txt");
    file_put_contents("narodoweCzytanie.txt", $tekst);

function pokazPlik($nazwaPliku) {
    if (file_exists($nazwaPliku)) {
        $zawartosc = file_get_contents($nazwaPliku);
        echo nl2br($zawartosc);
    } else {
        echo "Plik $nazwaPliku nie istnieje.";
    }
}
    pokazPlik("narodoweCzytanie.txt");