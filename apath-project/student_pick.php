<?php
session_start();
$id = $_SESSION["id"];

if(isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";
    // You might want to redirect the user to a login page or perform other actions here
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Pickup Information</title>
</head>
<body>
<br>
  <h2>APATH-Pickup Information</h2>
<?php
  include("studentnav.php");
  
?>
<?php
   include "input_test.php";
?>
<p>we are working on finding a volunteer to pick you up from the airport; information will be available later.</p>

    
</body>
</html>