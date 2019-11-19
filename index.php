<?php
    $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");
    $tablica = array();

    $pierwszaLinia = fgets($plik);
    while( !feof($plik)){
            $tab = fgets($plik);
            if($tab!=null)
                $tablica[] = $tab;
    }
    fclose($plik);

    if( isset( $_POST['id'] ) ){
        $linia = $_POST['id'] . " ";
        $linia .= $_POST['imie'] . " ";
        $linia .= $_POST['nazwisko'] . " ";
        $linia .= $_POST['zawod'] . " ";
        $linia .= $_POST['pensja'] . "\n";

        $i=0;
        $idInTable=false;
        foreach ($tablica as $wiersz) {
            if(explode(" ", $wiersz)[0] == intval($_POST['id']) ){
                $tablica[$i] = $linia;
                $idInTable=true;
                break;
            }
            $i++;
        }
        if(!$idInTable){
            $tablica[] = $linia;
        }

        if($_POST['nextId'] != ""){
            $pierwszaLinia = "NastepneId " . $_POST['nextId'] . "\n";
        }
    }

    if( isset($_GET['id']) ){
        $i=0;
        foreach ($tablica as $wiersz) {
            if(explode(" ", $wiersz)[0] == intval($_GET['id']) ){
                unset($tablica[$i]);
                break;
            }
            $i++;
        }
    }

    $klucz = "";
    if( isset( $_POST['klucz'] ) ){
        $klucz = $_POST['klucz'];
    }

    $plik = @fopen("plik.txt", "w") or die ("Błąd pliku!");
    fwrite($plik, $pierwszaLinia);
    foreach($tablica as $wiersz){
        fwrite($plik, $wiersz);
    }
    fclose($plik);

    $tab = [];
    foreach($tablica as $wiersz){
        $rekord = explode(" ", $wiersz);

        if( (!empty($klucz) && strpos(strtolower($rekord[2]), strtolower($klucz) ) === 0) || $klucz==""){
            $tab[] = $wiersz;
        }
    }

include 'widokListy.php';
