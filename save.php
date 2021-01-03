<?php
require('db.php');
$amzidd = $_GET["aid"];
$samidd = $_GET["sid"];
$quann = $_GET["qu"];
$sqq = $_GET["sq"];
$spp = $_GET["sp"];
$see = $_GET["se"];
$pnamee = $_GET["pn"];

$samidd = mysqli_real_escape_string($samidd);
$quann = mysqli_real_escape_string($quann);
$sqq = mysqli_real_escape_string($sqq);
$spp = mysqli_real_escape_string($spp);
$see = mysqli_real_escape_string($see);
$pnamee = mysqli_real_escape_string($pnamee);



//mysqli_real_escape_string

if ($amzidd !="" || $samidd !="" || $quann !="" || $pnamee !="" || $sqq !="" || $spp !="" || $see !="") {
$sql = "INSERT INTO orders (amzid, samid, quantity, samq, samp, same, pname, user_id)
VALUES ('$amzidd', '$samidd', '$quann', '$sqq', '$spp', '$see', '$pnamee', '1')";

if ($conn->query($sql) === TRUE) {
  echo "ok";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
echo "Please Enter complete details";
}

$conn->close();
  
?>