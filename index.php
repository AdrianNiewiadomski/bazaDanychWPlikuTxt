<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Baza Danych w pliku txt</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            // $plik = @fopen("plik.txt", "r+") or die ("Błąd pliku!");
            $plik = @fopen("plik.txt", "r") or die ("Błąd pliku!");
            $tablica = array();

            $pierwszaLinia = fgets($plik);
            while( !feof($plik)){
                    //echo fgets($plik) . "<br/>";
                    //$tablica[] = fgets($plik);
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
                // $tablica[intval($_POST['id'])-1] = $linia;
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
                // unset($tablica[ intval($_GET['id'])-1 ]);
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
        ?>

        <form action="index.php" method="post">

            <?php
                echo "<input type='text' name='klucz' value='$klucz'>";
             ?>

            <input type="submit" value="Filtruj">
        </form>

        <br />

        <a href="formularz.php">Dodaj osobę</a>

        <table>
			<tr>
				<th>id</th>
				<th>Imie</th>
				<th>Nazwisko</th>
				<th>Zawod</th>
				<th>Pensja</th>
                <th>Opcje</th>
			</tr>
            <?php
                foreach($tablica as $wiersz){
                    // echo $wiersz . "<br/>";
                    $rekord = explode(" ", $wiersz);

                    if( (!empty($klucz) && strpos(strtolower($rekord[2]), strtolower($klucz) ) === 0) || $klucz==""){
                    // if( (!empty($klucz) && strpos(strtolower($rekord[2]), $klucz) != false) || $klucz==""){
    					echo '<tr>';
    					echo "<td>$rekord[0]</td>";
    					echo "<td>$rekord[1]</td>";
    					echo "<td>$rekord[2]</td>";
    					echo "<td>$rekord[3]</td>";
    					echo "<td>$rekord[4]</td>";
                        echo "<td>";
                        echo "<a href='formularz.php?id=$rekord[0]' class='blue'>Edytuj</a>";
                        echo "<a href='index.php?id=$rekord[0]' class='red'>Usuń</a>";
                        echo "</td>";
    					echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>
