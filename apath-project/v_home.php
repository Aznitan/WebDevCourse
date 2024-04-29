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
 
    <title>Volunteer-APATH</title>
    <h2>APATH</h2>
  <?php
  include("volunteernav.php");
  
  ?>
</head>
<body>
<br>
    <br>
    <p>Welcome to Atlanta,GA</p>
   
    <p>Please complete your personal profile</p>
    <br>
    <p>If you would like to volunteer for airport pickup. please provide your car info</p>



</body>
</html>