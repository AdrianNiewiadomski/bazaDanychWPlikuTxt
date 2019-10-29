<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Baza Danych w pliku txt</title>
    </head>
    <body>
        <?php
            $plik = @fopen("plik2.txt", "r") or die ("Błąd pliku!");
            echo fgets($plik);
            fclose($plik);
        ?>
    </body>
</html>
