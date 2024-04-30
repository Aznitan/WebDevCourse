<?php
session_start();
$id = $_SESSION["id"];

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";
    // You might want to redirect the user to a login page or perform other actions here
}
?>
<html lang="en">

<head>
    <h2>APATH-Admin Approve</h2>
    <title>Admin Approve</title>

    <?php
    include ("admin_nabvar.php");
    $s_id = $_GET['id'];
    
    // echo "id of this user is ".$s_id."<br>";
    include ("connection.php");
    $qs = "UPDATE pickup
    SET approved ='Yes'
    WHERE s_id = '$s_id'";

    mysqli_query($dbc, $qs);
    $registerd = mysqli_affected_rows($dbc);
    echo $registerd . "Pick up table has been updated <br>";
    mysqli_close($dbc);
    ?>
</head>

<body>
    <br>
    <br>
    <p</p>





</body>

</html>