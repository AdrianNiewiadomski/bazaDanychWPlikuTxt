<?php
    include 'Osoba.class.php';

    // Odczyt bazy danych
    $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");
    $osoby = array();
    $pierwszaLinia = fgets($plik);
    while( !feof($plik)){
            $linia = fgets($plik);
            if($linia!=null)
                $osoby[] = Osoba::utworzOsobe($linia);
    }
    fclose($plik);

    // Jesli przeslano id z formularza (dodawanie lub edycja osoby)
    if( isset( $_POST['id'] ) ){

        $nowaOsoba = new Osoba($_POST['id'], $_POST['imie'], $_POST['nazwisko'], $_POST['zawod'], $_POST['pensja']);

        $i=0;
        $idInTable=false;

        foreach ($osoby as $osoba) {
            // Jesli spelnione to osoba jest w bazie danych (wiec nalezy poprawic jej dane)
            if($osoba->id == $nowaOsoba->id){
                $osoby[$i] = $nowaOsoba;
                $idInTable=true;
                break;
            }
            $i++;
        }
        // Jesli spelnione to osoby nie ma w bazie i trzeba ja dodac.
        if(!$idInTable){
            $osoby[] = $nowaOsoba;
        }

        if($_POST['nextId'] != ""){
            $pierwszaLinia = "NastepneId " . $_POST['nextId'] . "\n";
        }
    }

    // Jesli przeslano id z listy osob (usuniecie osoby)
    if( isset($_GET['id']) ){
        $i=0;

        foreach ($osoby as $osoba) {

            if($osoba->id == intval($_GET['id']) ){
                // funkcja unset usuwan wskazana komorke tablicy
                unset($osoby[$i]);
                break;
            }
            $i++;
        }
    }

    //Jesli przeslano klucz to filtrujemy
    $klucz = "";
    if( isset( $_POST['klucz'] ) ){
        $klucz = $_POST['klucz'];
    }

    // zapis w tablicy
    $plik = @fopen("plik.txt", "w") or die ("Błąd pliku!");
    fwrite($plik, $pierwszaLinia);
    foreach($osoby as $osoba){
        fwrite($plik, $osoba->toString());
    }
    fclose($plik);

    $tab = [];

    foreach($osoby as $osoba){

        if( (!empty($klucz) && strpos(strtolower($osoba->nazwisko), strtolower($klucz) ) === 0) || $klucz==""){
            $tab[] = $osoba->toString();
        }
    }

include 'widokListy.php';
