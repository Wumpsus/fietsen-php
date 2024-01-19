<?php
//conect database
include "connect.php";

//maak een query
$sql = "SELECT * FROM fietsen";
//prepare  query
$stmt = $conn->prepare($sql);
//uitvoeren
$stmt->execute();
//ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($result);
echo "<br>";

//print de data in een rij
echo "<table border=1px>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['merk'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['prijs'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>