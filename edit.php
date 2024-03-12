<?php
    if (isset($_GET['brouwcode'])){

        echo "mijn id is: " . $_GET['brouwcode'];

        //opvragen data van het id (record uit de tabel fietsen)
        //select * FROM bieren WHERE brouwcode = $_GET['brouwcode']
        
//conect database
include "connect.php";

//maak een query
$sql = "SELECT * FROM bieren WHERE brouwcode = :brouwcode";
//prepare  query
$stmt = $conn->prepare($sql);
//uitvoeren
$stmt->execute([':brouwcode'=>$_GET['brouwcode']]);
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
    <title>Bieren Formulier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Bieren Toevoegen</h1>

<form action="" method="post">
    <label for="brouwcode">brouwcode:</label>
    <input type="text" id="brouwcode" name="brouwcode" required value="<?php echo $result['brouwcode']; ?>"><br>

    <label for="naam">naam:</label>
    <input type="text" id="naam" name="naam" required value="<?php echo $result['naam']; ?>"><br>

    <label for="land">land:</label>
    <input type="text" id="land" name="land" required value="<?php echo $result['land']; ?>"><br>

    <input type="submit" value="Toevoegen">
</form>

</body>
</html>