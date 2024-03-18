<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {   
    //echo"my id inside the post methis is ".$id;
    include("connection.php");
    $id=$_POST["id"];
    $newfirstname= mysqli_real_escape_string($dbc,trim($_POST["firstname"]));
    $newlasstname= mysqli_real_escape_string($dbc,trim($_POST["lastname"]));
    $newemail= mysqli_real_escape_string($dbc,trim($_POST["email"]));
}
$qs="DELETE FROM users WHERE id=$id";
mysqli_query($dbc, $qs);
echo"This user with email".$newemail." has been deleted!";
echo "<br> Please <a href='admin_display.php'>click here</a> to go back. <br>";
?>