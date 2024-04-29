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
    <title>Flight Information</title>
</head>
<body>
<br>
  <h2>APATH-Flight Information</h2>
  <?php
  include("studentnav.php");
  
  ?>
  <?php
   include "input_test.php";

   $pick=$f_info=$a_f_num=$a_name=$a_date=$a_time=$d_f_num=$d_name=$d_date=$d_time=$b_luggage=$s_luggage="";
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pick = test_input($_POST["pickup"]);
        $f_info = test_input($_POST["finfo"]);
        $a_f_num = test_input($_POST["afnum"]);
        $a_name = test_input($_POST["aaname"]);
        $a_date = test_input($_POST["adate"]);
        $a_time = test_input($_POST["atime"]);
        $d_f_num = test_input($_POST["dfnum"]);
        $d_name = test_input($_POST["daname"]);
        $d_date = test_input($_POST["ddate"]);
        $d_time = test_input($_POST["dtime"]);
        $b_luggage = test_input($_POST["big"]);
        $s_luggage = test_input($_POST["small"]);

        // Validations
        
        if ($pick == "") {
            $pickErr = "Pick-up location is required!";
            $flag = 1;
        }else{
            $flag = 0;
        }
        
        // Flight Information Validation
        if ($f_info == "") {
            $f_infoErr = "Flight information is required!";
            $flag = 2;
        }   else{
            $flag = 0;
        }
        
        // Arrival Flight Number Validation
        if ($a_f_num == "") {
           $a_f_num = "N/A";
        }   else{
            $flag = 0;
        }
        
        // Arrival Name Validation
        if ($a_name == "") {
            $a_nameErr = "Arrival name is required!";
            $flag = 4;
        }   else{
            $flag = 0;
        }
        
        // Arrival Date Validation
        if ($a_date == "") {
            $a_dateErr = "Arrival date is required!";
            $flag = 5;
        }   else{
            $flag = 0;
        }
        
        // Arrival Time Validation
        if ($a_time == "") {
            $a_timeErr = "Arrival time is required!";
            $flag = 6;
        }   else{
            $flag = 0;
        }
        
        // Departure Flight Number Validation
        if ($d_f_num == "") {
            $d_f_numErr = "Departure flight number is required!";
            $flag = 7;
        }   else{
            $flag = 0;
        }
        
        // Departure Name Validation
        if ($d_name == "") {
            $d_nameErr = "Departure name is required!";
            $flag = 8;
        }   else{
            $flag = 0;
        }
        
        // Departure Date Validation
        if ($d_date == "") {
            $d_dateErr = "Departure date is required!";
            $flag = 9;
        }   else{
            $flag = 0;
        }
        
        // Departure Time Validation
        if ($d_time == "") {
            $d_timeErr = "Departure time is required!";
            $flag = 10;
        }   else{
            $flag = 0;
        }
        
        // Baggage Luggage Validation
        if ($b_luggage == "") {
            $b_luggageErr = "Baggage luggage is required!";
            $flag = 11;
        }   else{
            $flag = 0;
        }
        
        // Special Luggage Validation
        if ($s_luggage == "") {
            $s_luggageErr = "Special luggage is required!";
            $flag = 12;
        }   else{
            $flag = 0;
        }
        echo $flag;

        // If all validations pass, proceed to database operation
        if ($flag == 0) {
            include "connection.php";
                $sqs = "UPDATE student SET pickup='$pick', flightInfo='$f_info', flightnum='$a_f_num', 
                a_airname='$a_name', a_date='$a_date', a_time='$a_time', 
                d_flightnum='$d_f_num', d_airname='$d_name', d_date='$d_date', 
                d_time='$d_time', big_luggage='$b_luggage', small_luggage='$s_luggage' 
                WHERE s_id='$id'";
                //run the query 
                mysqli_query($dbc, $sqs);
                if (mysqli_affected_rows($dbc) ==1) {
                    echo "You have updated the student successfully!";
                    mysqli_close($dbc);
                    echo "<script> window.location.href='student_profile.php';</script>";
                }
                else {
                    echo "Something is Wrong!". mysqli_error($dbc);
                }
        }
    }
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
    
    Do you need airport pickup : 
    <input type="radio" name="pickup" <?php if (isset($pick) && $pick == "yes") echo "checked" ?> value="yes">Yes
    <input type="radio" name="pickup" <?php if (isset($pick) && $pick == "no") echo "checked" ?> value="no">No
    <br><br>
    Do you have the flight Informatio? : 
    <input type="radio" name="finfo" <?php if (isset($f_info) && $f_info == "yes") echo "checked" ?> value="yes">Yes
    <input type="radio" name="finfo" <?php if (isset($f_info) && $f_info == "no") echo "checked" ?> value="no">No
    <br><br>
    <!-- Arriving Information -->
    if yes, arriving Atlanta - Flight Number : <input type="text" name="afnum" value="<?php echo isset($a_f_num) ? htmlspecialchars($a_f_num) : ''; ?>"><br><br>

    Arriving Atlanta -Airline Name : <input type="text" name="aaname" value="<?php echo isset($a_name) ? htmlspecialchars($a_name) : ''; ?>"><br><br>
    Arriving Atlanta - Date : <input type="date" name="adate" value="<?php echo isset($a_date) ? htmlspecialchars($a_date) : ''; ?>"><br><br>
    Arriving Atlanta - Time : <input type="time" name="atime" value="<?php echo isset($a_time) ? htmlspecialchars($a_time) : ''; ?>"><br><br>
    <!-- Departing Info -->
    Leaving China - Flight Number : <input type="text" name="dfnum" value="<?php echo isset($d_f_num) ? htmlspecialchars($d_f_num) : ''; ?>"><br><br>
    Leaving China - Airline Name : <input type="text" name="daname" value="<?php echo isset($d_name) ? htmlspecialchars($d_name) : ''; ?>"><br><br>
    Leaving China - Date : <input type="date" name="ddate" value="<?php echo isset($d_date) ? htmlspecialchars($d_date) : ''; ?>"><br><br>
    Leaving China - Time : <input type="time" name="dtime" value="<?php echo isset($d_time) ? htmlspecialchars($d_time) : ''; ?>"><br><br>
   <!-- luggage -->
   How many piece of big luggage : <input type="number" min = "1" max = "99" name="big" value="<?php echo isset($b_luggage) ? htmlspecialchars($b_luggage) : ''; ?>"> <br><br>
   How many piece of small luggage : <input type="number" min = "1" max = "99" name="small" value="<?php echo isset($s_luggage) ? htmlspecialchars($s_luggage) : ''; ?>"> <br><br>
   <br>

    <input type="submit" value="Submit">
</form>

    
</body>
</html>