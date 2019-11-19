<?php
    $id =  "";
    $nextId = "";
    $imie =  "";
    $nazwisko =  "";
    $zawod =  "";
    $pensja = "";

    $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");

    if(isset($_GET['id'])){
        //echo $_GET['id'];
        $id = $_GET['id'];

        fgets($plik);
        // $i=1;
        // while( $i<$id){
        while(true){
            // $tab = fgets($plik);
            // $i++;
            $wiersz = fgets($plik);
            if(explode(" ", $wiersz)[0]==$id){
                break;
            }
        }
        // $wiersz = fgets($plik);
        // fclose($plik);
        $rekord = explode(" ", $wiersz);
        $imie = $rekord[1];
        $nazwisko = $rekord[2];
        $zawod = $rekord[3];
        $pensja = $rekord[4];
    } else {
        // $i=0;
        // while( !feof($plik)){
        //         fgets($plik);
        //         //echo $i;
        //         $i++;
        // }
        // $id=$i;
        $id = trim(explode(" ", fgets($plik) )[1]);
        $nextId = intval($id)+1;
    }

    fclose($plik);

include 'formularzWidok.php';
