<?php
session_start();
//$id = $_SESSION["id"];
//echo "session id is " . $id . "<br>"; // for developers
session_destroy();

$_SESSION=array();
// go to index page 
echo "<script> window.location.href='index.php';</script>";

?>