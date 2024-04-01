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
 
    <title>Admin-Manage-Volunteers-APATH</title>
    <h2>APATH</h2>
  <?php
  include("admin_nabvar.php");
  
  ?>
</head>
<body>
    <br><br><br>
    <p>Display Volunteers Info</p>
    <br>
    <br>
   <form action="">

   </form>



</body>
</html>