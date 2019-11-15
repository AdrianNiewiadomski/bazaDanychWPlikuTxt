<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Formularz</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
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
                $i=1;
                while( $i<$id){
                        $tab = fgets($plik);
                        $i++;
                }
                $wiersz = fgets($plik);
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
                $id = explode(" ", fgets($plik) )[1];
                $nextId = intval($id)+1;
            }

            fclose($plik);
        ?>

        <form action="index.php" method="post">
            id:<br/>

            <?php
                echo "<input type='text' name='id' value='$id'>";
                echo "<input type='hidden' name='nextId' value='$nextId'>";
                echo "<br/>Imię:<br/>";
                echo "<input type='text' name='imie' value='$imie'>";
                echo "<br/>Nazwisko:<br/>";
                echo "<input type='text' name='nazwisko' value='$nazwisko'>";
                echo "<br/>Zawód:<br/>";
                echo "<input type='text' name='zawod' value='$zawod'>";
                echo "<br/>Pensja:<br/>";
                echo "<input type='text' name='pensja' value='$pensja'>";
            ?>

            <br/>
            <input type="submit" value="Zatwierdź">
            <a href="index.php">Anuluj</a>
        </form>
    </body>
</html>
