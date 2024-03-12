<?php
// Connect database
include "connect.php";

// Maak een query
$sql = "SELECT * FROM brouwer";

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
    echo "<td>" . $row['brouwcode'] . "</td>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<td>" . $row['land'] . "</td>";
    echo "<td><a href='edit.php?brouwcode=" . $row['brouwcode'] . "'>" . "Wijzigen</a></td>";
    echo "<td><a href='delete.php?brouwcode=" . $row['brouwcode'] . "'>" . "Verwijder</a></td>";
}
echo "</table>";
?>
