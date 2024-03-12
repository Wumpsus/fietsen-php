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

<h1>bier toevoegen</h1>

<form action="" method="post">
    <label for="brouwcode">Brouwcode:</label>
    <input type="text" id="brouwcode" name="brouwcode" required><br>

    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required><br>

    <label for="prijs">land:</label>
    <input type="text" id="land" name="land" required><br>

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
$sql = "INSERT INTO brouwer (brouwcode, naam, land) 
VALUES (:brouwcode, :naam, :land, :Foto);";
//prepare  query
$query = $conn->prepare($sql);
//uitvoeren
$status = $query->execute(
    [
        ':brouwcode'=>$_POST['brouwcode'],
        ':naam'=>$_POST['naam'],
        ':land'=>$_POST['land'],
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