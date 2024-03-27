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
 
    <title>Student-APATH</title>
    <h2>APATH</h2>
  <?php
  include("studentnav.php");
  
  ?>
</head>
<body>
    
    <p>Welcome to Atlanta,GA</p>
    <br>
    <br>
    <p>Please complete your personal profile</p>
    <br>
    <p>If you need airport pickup, please provide your flight inmortaion.</p>



</body>
</html>