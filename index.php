<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Baza Danych w pliku txt</title>
    </head>
    <body>
        <?php
            $plik = fopen("plik.txt", "r");
            echo fgets($plik);
            fclose($plik);
        ?>
    </body>
</html>
