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
    <title>Car Info</title>
</head>

<body>
    <br>
    <h2>APATH - Car Information</h2>
    <?php
    include ("volunteernav.php");

    ?>
    <?php
    include "input_test.php";

    $carma = $carmod = $seats = $luggages =$car_y = "";
    
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $carma = test_input($_POST["carmanu"]);
        $carmod = test_input($_POST["carmodel"]);
        $seats = test_input($_POST["seatcar"]);
        $luggages = test_input($_POST["lugg"]); 
        $car_y = test_input($_POST["caryr"]);
    
       
            include "connection.php";
            // Check if the v_id needs to be inserted
            $sqs = "UPDATE volunteer 
            SET car_manu='$carma', car_model='$carmod', car_year='$car_y',
                seats='$seats', lugga='$luggages' 
            WHERE v_id='$id'";
            //run the query 
            mysqli_query($dbc, $sqs);
            if (mysqli_affected_rows($dbc) == 1) {
                echo "Volunteer information updated successfully!";
                mysqli_close($dbc);
                echo "<script> window.location.href='v_car.php';</script>";
            } else {
                echo "Something is Wrong!" . mysqli_error($dbc);
            }


       
    }
    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
        <!-- Personal Information -->
        What is the manufacture of your car: <input type="text" name="carmanu"
            value="<?php echo isset($carma) ? htmlspecialchars($carma) : ''; ?>"> <br><br>
        What is the model of your car: <input type="text" name="carmodel"
            value="<?php echo isset($carmod) ? htmlspecialchars($carmod) : ''; ?>"> <br><br>
        Car Year: <input type="text" name="caryr"
            value="<?php echo isset($car_y) ? htmlspecialchars($car_y) : ''; ?>"> <br><br>
        How many seats your car has: <input type="number" min="0" max="9" name="seatcar"
            value="<?php echo isset($seats) ? htmlspecialchars($seats) : ''; ?>"><br><br>
        How many piece of big luggage your vehicle could handle: <input type="number" min="0" max="9" name="lugg"
            value="<?php echo isset($luggages) ? htmlspecialchars($luggages) : ''; ?>"><br><br>


        <input type="submit" value="Submit">
    </form>


</body>

</html>