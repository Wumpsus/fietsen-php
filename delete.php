
<?php
if ($_SERVER["REQUEST_METHOD"]  == "GET") {
    echo "Er is gepost<br>";
    print_r($_GET);

    //conect database
include "connect.php";

//maak een query
$sql = "DELETE FROM bieren WHERE brouwcode = :brouwcode";
//prepare  query
$query = $conn->prepare($sql);
//uitvoeren
$status = $query->execute(
    [
        ':brouwcode'=>$_GET['brouwcode']
       
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