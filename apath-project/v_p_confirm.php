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
    <h2>APATH-Volunteer Confirm</h2>
    <title>Volunteer-Confirm</title>

    <?php
    include ("volunteernav.php");
    $s_id = $_GET['id'];
    // echo "id of this user is ".$s_id."<br>";
    include ("connection.php");
    $qs = "INSERT INTO pickup ( v_id, s_id, approved)
    VALUES('$id','$s_id','No')";
    mysqli_query($dbc, $qs);
    $registerd = mysqli_affected_rows($dbc);
    echo $registerd . "Thank you for volunteering. You will see the detail information about this pickup task under Pickup Assignment
    once our team has reviewed and approved it. <br>";
    mysqli_close($dbc);
    ?>
</head>

<body>
    <br>
    <br>
    <p</p>





</body>

</html>