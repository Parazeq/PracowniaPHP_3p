<?php
    touch("nazwisko_i_imie.txt");
    touch("DoSkasowania.txt");
    unlink("DoSkasowania.txt");
    mkdir("Jakub_Kocur");
    touch("Jakub_Kocur/nazwisko_i_imie.txt");
