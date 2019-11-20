<?php
    $nextId = "";
    // $id =  "";    
    // $imie =  "";
    // $nazwisko =  "";
    // $zawod =  "";
    // $pensja = "";
    include 'Osoba.class.php';
    $osoba = new Osoba("", "", "", "", "");

    $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");

    // podanie id oznacza edycje osoby
    if(isset($_GET['id'])){
        // $id = $_GET['id'];
        $osoba->id = $_GET['id'];

        fgets($plik);

        while(true){
            $wiersz = fgets($plik);
            // if(explode(" ", $wiersz)[0]==$id){
            if(explode(" ", $wiersz)[0]==$osoba->id){
                break;
            }
        }

        $rekord = explode(" ", $wiersz);
        $osoba->imie = $rekord[1];
        $osoba->nazwisko = $rekord[2];
        $osoba->zawod = $rekord[3];
        $osoba->pensja = $rekord[4];

    // niepodanie id oznacza tworzenie nowej osoby
    } else {

        $osoba->id = trim(explode(" ", fgets($plik) )[1]);
        $nextId = intval($osoba->id)+1;
    }

    fclose($plik);

include 'formularzWidok.php';
