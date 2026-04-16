<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="nazov">Nazov filmu: </label><input type="text" name="nazov">
        <br>
        <label for="zaner">Zaner filmu: </label><input type="text" name="zaner">
        <br>
        <label for="dlzka">Dlzka filmu: </label><input type="text" name="dlzka">
        <br>
        <br>
        <label for="meno">Meno rezisera: </label><input type="text" name="meno">
        <br>
        <label for="priezvsko">Priezvisko rezisera: </label><input type="text" name="priezvisko">
        <br>
        <label for="vek">Vek rezisera: </label><input type="text" name="vek">
        <br>
        <input type="submit" value="pridaj" name="submit">
    </form>
    <?php 
        $serverik = new mysqli("localhost", "root", "root");
        $vytvorik = "CREATE DATABASE IF NOT EXISTS filmova_databaza;";
        $kvery = mysqli_query($serverik, $vytvorik);
        $konektik = mysqli_connect("localhost", "root", "root", "filmova_databaza");

        if(!$konektik) {
            echo "Nepripojilo sa :(";
        } else {
            echo "Pripojilo sa :)";
        }
        $reziser = "CREATE TABLE IF NOT EXISTS reziser(
        reziser_id int primary key auto_increment,
        meno varchar(30) not null,
        priezvisko varchar(30) not null,
        vek int not null);";

        $filmy = "CREATE TABLE IF NOT EXISTS filmy( 
        film_id int primary key auto_increment,
        reziser_id int not null,
        nazov varchar(50) unique not null,
        zaner varchar(25) not null,
        dlzka int not null,
        foreign key (reziser_id) references reziser(reziser_id));";

        $kvery = mysqli_query($conn, $film);
        $kvery = mysqli_query($conn, $reziser);


        $dummy_film = "INSERT INTO filmy (nazov, zaner, dlzka) VALUES ('Project Hail Mary', 'Sci-Fi', '157');";
        $dummy_reziser = "INSERT INTO reziser (meno, priezvisko, vek) VALUES ('Phillip', 'Lord', '50')";

        $kvery = mysqli_query($conn, $dummy_film);
        $kvery = mysqli_query($conn, $dummy_reziser);

    ?>
</body>
</html>