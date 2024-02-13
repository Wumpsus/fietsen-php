<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fietsen Formulier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Fietsen Toevoegen</h1>

<form action="" method="post">
    <label for="merk">Merk:</label>
    <input type="text" id="Merk" name="Merk" required><br>

    <label for="type">Type:</label>
    <input type="text" id="Type" name="Type" required><br>

    <label for="prijs">Prijs:</label>
    <input type="number" id="Prijs" name="Prijs" required><br>

    <label for="foto">Foto URL:</label>
    <input type="text" id="Foto" name="Foto"><br>

    <input type="submit" value="Toevoegen">
</form>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
    echo "Er is gepost<br>";
    print_r($_POST);

    //conect database
include "connect.php";

//maak een query
$sql = "INSERT INTO fietsen (Merk, Type, Prijs, Foto) 
VALUES (:Merk, :Type, :Prijs, :Foto);";
//prepare  query
$query = $conn->prepare($sql);
//uitvoeren
$status = $query->execute(
    [
        ':Merk'=>$_POST['Merk'],
        ':Type'=>$_POST['Type'],
        ':Prijs'=>$_POST['Prijs'],
        ':Foto'=>$_POST['Foto']
    ]
);
if($status == true){
    echo "<script>alert(Toevoegen is gelukt!)</script>";
    echo "<script>location.replace(homepage.php); </script>";
    header("location:homepage.php");
} else {
    echo "<script>alert(Toevoegen is niet gelukt.)</script>";
}
}

?>