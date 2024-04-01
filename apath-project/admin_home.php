<?php
session_start();
$id = $_SESSION["id"];
    

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";

}
?>
<html lang="en">

<head>

    <title>Admin-APATH</title>
    <h2>APATH</h2>
    <?php
    include ("admin_nabvar.php");

    ?>
</head>

<body>
    <?php
    include "input_test.php";

    $firstname = $lastname = $gender = $cellphone = $username =  "";
    $firstnameErr = $lastnameErr = $genderErr = $cellphoneErr =  "";
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $gender = test_input($_POST["gender"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $username = test_input($_POST["username"]);
        if ($firstname == "" || $firstname == "firsname") {
            $firstnameErr = "First Name is required!";
            $flag = 1;
        } else {
            echo "Welcome " . $firstname;
        }

        if ($lastname == "" || $lastname == "lastname") {
            $lastnameErr = "Last name is required";
            $flag = 2;
        }
        
        if ($phone == "" || $phone == "678-123-1234") {
            $phoneErr = "Phone is required";
            $flag = 4;
        }
           // If all validations pass, proceed to database operation
           if ($flag == 0) {
            include "connection.php";
            
            $sqs = "SELECT * from apath WHERE email = '$email' ";
            $qresult = mysqli_query($dbc, $sqs);
            $num = mysqli_num_rows($qresult);
            if ($num == 0) {
                echo "<br><h3>User Profile already filled up</h3></br>".$flag;
            } else {
                $sqs = "INSERT INTO adminapath( lastname,firstname,gender,afiliation,email,cellphone, username,pw) 
                VALUES('$lastname','$firstname','$gender','$afiliation','$email','$cellphone','$username','$pw')";
                mysqli_query($dbc, $sqs);
                $registerd = mysqli_affected_rows($dbc);
                echo $registerd . " Admin Personal Profile updated successfully <br>";
                mysqli_close($dbc);
                //header("Location: student_profile.php");
                 echo "<script> window.location.href='admin_home.php';</script>";

            }
        }
    }

    ?>
    <br><br><br>
    <p>Display profile of the admin</p>
    <br>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
        <!-- Personal Information -->
        Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"> <span class="error">*
            <?php echo $lastnameErr; ?>
        </span><br><br>
        First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"> <span class="error">*
            <?php echo $firstnameErr; ?>
        </span><br><br>

        Gender:
        <span class="error">*
            <?php echo $genderErr; ?>
        </span><br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")
            echo "checked" ?>
                value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male")
            echo "checked" ?>
                value="male">Male
            <br><br>

        Affiliation/Reccommended by <input type="text" name="major"
            value="<?php echo isset($afiliation) ? htmlspecialchars($afiliation) : ''; ?>"><br><br>

        Email: <input type="email" name="email"
            value="<?php echo isset($email) ? htmlspecialchars($email) : $email; ?>"><br><br>

        Cellphone Number: <input type="tel" name="phone"
            value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>"><br><br>


        Choose a Username: <input type="text" name="username"
            value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"><br><br>

        Password: <input type="password" name="password"
            value="<?php echo isset($pw) ? htmlspecialchars($pw) : ''; ?>"><br><br>

        Confirm Password: <input type="password" name="confirm_password"
            value="<?php echo isset($confirm_password) ? htmlspecialchars($confirm_password) : ''; ?>"><br><br>


        <input type="submit" value="Submit">
    </form>



</body>

</html>