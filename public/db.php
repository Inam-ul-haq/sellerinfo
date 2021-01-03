<?php
$dbhost = "127.0.0.1";
 $dbuser = "seseller_send";
 $dbpass = "4073";
 $db = "seseller_send";



$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>