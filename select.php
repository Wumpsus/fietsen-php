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

echo "<br>";

//print de data in een rij
echo "<table border=1px>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['Merk'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['Prijs'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>