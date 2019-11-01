<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Formularz</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            if(isset($_GET['id'])){
                echo $_GET['id'];
            }

        ?>

        <form action="index.php" method="post">
            id:<br/>
            <input type="text" name="id">
            <br/>
            Imię:<br/>
            <input type="text" name="imie">
            <br/>
            Nazwisko:<br/>
            <input type="text" name="nazwisko">
            <br/>
            Zawód:<br/>
            <input type="text" name="zawod">
            <br/>
            Pensja:<br/>
            <input type="text" name="pensja">
            <br/>
            <input type="submit" value="Zatwierdź">
            <a href="index.php">Anuluj</a>
        </form>
    </body>
</html>
