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
        ?>
        <table>
			<tr>
				<th>id</th>
				<th>Imie</th>
				<th>Nazwisko</th>
				<th>Zawod</th>
				<th>Pensja</th>
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
					echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>
