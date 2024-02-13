<?php
    if (isset($_GET['id'])){

        echo "mijn id is: " . $_GET['id'];

        //opvragen data van het id (record uit de tabel fietsen)
        //select * FROM fietsen WHERE id = $_GET['id']
        
//conect database
include "connect.php";

//maak een query
$sql = "SELECT * FROM fietsen WHERE ID = :ID";
//prepare  query
$stmt = $conn->prepare($sql);
//uitvoeren
$stmt->execute([':ID'=>$_GET['ID']]);
//ophalen alle data
$result = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($result);
    }
?>
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
    <input type="text" id="Merk" name="Merk" required value="<?php echo $result['Merk']; ?>"><br>

    <label for="type">Type:</label>
    <input type="text" id="Type" name="Type" required value="<?php echo $result['Type']; ?>"><br>

    <label for="prijs">Prijs:</label>
    <input type="number" id="Prijs" name="Prijs" required value="<?php echo $result['Prijs']; ?>"><br>

    <input type="submit" value="Toevoegen">
</form>

</body>
</html>