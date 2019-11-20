<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Baza Danych w pliku txt</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="index.php" method="post">

            <?php
                echo "<input type='text' name='klucz' value='$klucz'>";
             ?>

            <input type="submit" value="Filtruj">
        </form>

        <br />
        <a href="formularz.php">Dodaj osobę</a>

        <table>
            <thead>
                <tr>
    				<th>id</th>
    				<th>Imie</th>
    				<th>Nazwisko</th>
    				<th>Zawod</th>
    				<th>Pensja</th>
                    <th>Opcje</th>
    			</tr>
            </thead>
			<tbody>
                <?php
                    foreach($tab as $wiersz){
                        $rekord = explode(" ", $wiersz);

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
                ?>
            </tbody>
        </table>
    </body>
</html>
