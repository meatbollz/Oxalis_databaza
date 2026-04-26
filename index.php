<?php
    $konektik = mysqli_connect("localhost", "root", "root", "filmova_databaza");
    if(!$konektik) {
        echo "Nepripojilo sa :(";
    } else {
        echo "Pripojilo sa :)";
    }

if(isset($_POST['submit'])) {
    $nazov = $_POST['nazov'];
    $zaner = $_POST['zaner'];
    $dlzka = $_POST['dlzka'];

    $sql = "INSERT INTO filmy (nazov, zaner, dlzka) VALUES ('$nazov', '$zaner', '$dlzka')";
    if (!mysqli_query($konektik, $sql)) {
        echo mysqli_error($konektik);
    }

    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $vek = $_POST['vek'];

    $sql = "INSERT INTO reziser (meno, priezvisko, vek) VALUES ('$meno', '$priezvisko', '$vek')";
    if (!mysqli_query($konektik, $sql)) {
        echo mysqli_error($konektik);
    }
}

if(isset($_POST['zmen'])) {
    $zmeny_f = array();

    if (!empty($_POST['nazov'])){
        $zmeny_f[] = "nazov='" . $_POST["nazov"]. "'";
    }
    if (!empty($_POST['zaner'])){
        $zmeny_f[] = "zaner='" . $_POST["zaner"]. "'";
    }
    if (!empty($_POST['dlzka'])){
        $zmeny_f[] = "dlzka='" . $_POST["dlzka"]. "'";
    }
    
    if (!empty($zmeny_f)) {
        $sql = "UPDATE filmy SET " . implode(", ", $zmeny_f);
        mysqli_query($konektik, $sql);
    }

    $zmeny_r = array();
    if (!empty($_POST['meno'])){
        $zmeny_r[] = "meno='" . $_POST["meno"]. "'";
    }
    if (!empty($_POST['priezvisko'])){
        $zmeny_r[] = "priezvisko='" . $_POST["priezvisko"]. "'";
    }
    if (!empty($_POST['vek'])){
        $zmeny_r[] = "vek='" . $_POST["vek"]. "'";
    }

    if (!empty($zmeny_r)) {
        $sql = "UPDATE reziser SET " . implode(", ", $zmeny_r);
        mysqli_query($konektik, $sql);
    }
}
    
    if(isset($_POST['vymaz'])) {
        mysqli_query($konektik, "TRUNCATE TABLE filmy");
        mysqli_query($konektik, "TRUNCATE TABLE reziser");
    }

?>
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
        <input type="submit" value="zmen" name="zmen">
        <input type="submit" value="vymaz" name="vymaz">
    </form>
<?php
$sql = "SELECT filmy.nazov, filmy.zaner, filmy.dlzka,
               reziser.meno, reziser.priezvisko, reziser.vek
        FROM filmy
        JOIN reziser";

$result = mysqli_query($konektik, $sql);

while ($row = mysqli_fetch_assoc($result)){
    echo "<h1>Názov: " . $row["nazov"] . "</h1>";
    echo "<p>Žáner: " . $row["zaner"] . "</p>";
    echo "<p>Dĺžka: " . $row["dlzka"] . " minút</p>";
    
    echo "<h2>Režisér</h2>";
    echo "<p>Meno: " . $row["meno"] . "</p>";
    echo "<p>Priezvisko: " . $row["priezvisko"] . "</p>";
    echo "<p>Vek: " . $row["vek"] . "</p>";

    echo "</div>";
}
?>