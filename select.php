<?php
// Connect database
include "connect.php";

// Maak een query
$sql = "SELECT * FROM fietsen";

// Prepare query
$stmt = $conn->prepare($sql);

// Uitvoeren
$stmt->execute();

// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<br>";

// Print de data in een rij
echo "<table border=1px>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['Merk'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['Prijs'] . "</td>";
    // Voeg de vaste afbeelding URL toe
    echo "<td><img src='img/markie.png' alt='Fietsfoto'></td>";
    echo "</tr>";
}
echo "</table>";
?>
