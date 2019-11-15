<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Baza Danych w pliku txt</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $plik = @fopen("plik.txt", "r+") or die ("Błąd pliku!");
            $tablica = array();

            while( !feof($plik)){
                    //echo fgets($plik) . "<br/>";
                    //$tablica[] = fgets($plik);
                    $tab = fgets($plik);
                    if($tab!=null)
                        $tablica[] = $tab;
            }

            if( isset( $_POST['id'] ) ){
                //$plik = @fopen("plik.txt", "a") or die ("Błąd pliku!");

                $linia = $_POST['id'] . " ";
                $linia .= $_POST['imie'] . " ";
                $linia .= $_POST['nazwisko'] . " ";
                $linia .= $_POST['zawod'] . " ";
                $linia .= $_POST['pensja'] . "\n";
                $tablica[intval($_POST['id'])-1] = $linia;

                fseek($plik, 0);
                foreach($tablica as $wiersz){
                    fwrite($plik, $wiersz);
                }
            }

            if( isset($_GET['action']) ){
                unset($tablica[ intval($_GET['id'])-1 ]);

                fseek($plik, 0);
                foreach($tablica as $wiersz){
                    fwrite($plik, $wiersz);
                }
            }

            fclose($plik);
        ?>
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
					echo '<tr>';
					echo "<td>$rekord[0]</td>";
					echo "<td>$rekord[1]</td>";
					echo "<td>$rekord[2]</td>";
					echo "<td>$rekord[3]</td>";
					echo "<td>$rekord[4]</td>";
                    echo "<td>";
                    echo "<a href='formularz.php?id=$rekord[0]' class='blue'>Edytuj</a>";
                    echo "<a href='index.php?action=delete&id=$rekord[0]' class='red'>Usuń</a>";
                    echo "</td>";
					echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>
