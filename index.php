<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Baza Danych w pliku txt</title>
    </head>
    <body>
        <?php
            $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");
            $tablica = array();

            while( !feof($plik)){
                // echo fgets($plik) . "<br/>";
                $tablica[] = fgets($plik);
            }

            fclose($plik);

            foreach($tablica as $wiersz){
                echo $wiersz . "<br/>";
            }
        ?>
    </body>
</html>
