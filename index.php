<?php
    include 'Osoba.class.php';

    // Odczyt bazy danych
    $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");
    // $tablica = array();
    $osoby = array();
    $pierwszaLinia = fgets($plik);
    while( !feof($plik)){
            $linia = fgets($plik);
            if($linia!=null)
                //$tablica[] = $linia;
                $osoby[] = Osoba::utworzOsobe($linia);
    }
    fclose($plik);

    // Jesli przeslano id z formularza (dodawanie lub edycja osoby)
    if( isset( $_POST['id'] ) ){
        // $linia = $_POST['id'] . " ";
        // $linia .= $_POST['imie'] . " ";
        // $linia .= $_POST['nazwisko'] . " ";
        // $linia .= $_POST['zawod'] . " ";
        // $linia .= $_POST['pensja'] . "\n";
        $nowaOsoba = new Osoba($_POST['id'], $_POST['imie'], $_POST['nazwisko'], $_POST['zawod'], $_POST['pensja']);

        $i=0;
        $idInTable=false;
        //foreach ($tablica as $wiersz) {
        foreach ($osoby as $osoba) {
            //if(explode(" ", $wiersz)[0] == intval($_POST['id']) ){
            if($osoba->id == $nowaOsoba->id){
                //$tablica[$i] = $linia;
                $osoby[$i] = $nowaOsoba;
                $idInTable=true;
                break;
            }
            $i++;
        }
        if(!$idInTable){
            // $tablica[] = $linia;
            $osoby[] = $nowaOsoba;
        }

        if($_POST['nextId'] != ""){
            $pierwszaLinia = "NastepneId " . $_POST['nextId'] . "\n";
        }
    }

    // Jesli przeslano id z listy osob (usuniecie osoby)
    if( isset($_GET['id']) ){
        $i=0;
        // foreach ($tablica as $wiersz) {
        foreach ($osoby as $osoba) {
            // if(explode(" ", $wiersz)[0] == intval($_GET['id']) ){
            if($osoba->id == intval($_GET['id']) ){
                // unset($tablica[$i]);
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

    $plik = @fopen("plik.txt", "w") or die ("Błąd pliku!");
    fwrite($plik, $pierwszaLinia);
    // foreach($tablica as $wiersz){
    //     fwrite($plik, $wiersz);
    // }
    foreach($osoby as $osoba){
        fwrite($plik, $osoba->toString());
    }
    fclose($plik);

    $tab = [];
    // foreach($tablica as $wiersz){
    foreach($osoby as $osoba){
        // $rekord = explode(" ", $wiersz);

        // if( (!empty($klucz) && strpos(strtolower($rekord[2]), strtolower($klucz) ) === 0) || $klucz==""){
        if( (!empty($klucz) && strpos(strtolower($osoba->nazwisko), strtolower($klucz) ) === 0) || $klucz==""){
            // $tab[] = $wiersz;
            $tab[] = $osoba->toString();
        }
    }

include 'widokListy.php';
