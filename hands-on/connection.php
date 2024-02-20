<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="4450spring24";

// this is the conneciton
$dbc=mysqli_connect($hostname, $username, $password, $dbname) OR die ("Cannot connect to DB, error....");

echo "Connected to the DB ".$dbname." successfully! <br>";

?>