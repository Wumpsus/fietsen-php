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
    echo "<td>". $row['ID'] . "</td>";
    echo "<td>" . $row['Merk'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>€" . $row['Prijs'] . "</td>";
    echo "<td><img src='img/markie.png" . $row['Foto'] . "'></td>";
    echo "<td><a href='edit.php?id=" . $row['ID'] . "'>" . "Wijzigen</a></td>";
    echo "<td><a href='delete.php?id=" . $row['ID'] . "'>" . "Verwijder</a></td>";
}
echo "</table>";
?>
