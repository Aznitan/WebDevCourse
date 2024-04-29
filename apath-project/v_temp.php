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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>House-Assing</title>
</head>

<body>
    <br>
    <h2>APATH - House-Assing</h2>
    <?php
    include ("volunteernav.php");

    ?>
    <?php
    include "input_test.php";

    ?>

<p>This page will show you the information of the student(s) that you are willing to host temporarily.</p>
    


</body>

</html>