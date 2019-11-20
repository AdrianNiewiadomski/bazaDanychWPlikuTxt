<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Formularz</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>


        <form action="index.php" method="post">

            <?php
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='hidden' name='nextId' value='$nextId'>";
                echo "Imię:<br/>";
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
