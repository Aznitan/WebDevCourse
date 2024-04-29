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
    <title>Profile</title>
</head>

<body>
    <br>
    <h2>APATH - Profile Information</h2>
    <?php
    include ("volunteernav.php");

    ?>
    <?php
    include "input_test.php";

    $firstname = $lastname = $englishname = $gender = $affirec = $phone2 = $email = $phone = $erchat_id = $covid = $username = $password11 = $confirm_password =  "";
    $firstnameErr = $lastnameErr = $englishnameErr = $genderErr = $emailErr = $phoneErr = $passwordErr = $confirm_passwordErr = "";
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = test_input($_POST["first_name"]);
        $lastname = test_input($_POST["last_name"]);
        $gender = test_input($_POST["gender"]);
        $affirec = test_input($_POST["affre"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $phone2 = test_input($_POST["phone2"]);
        $erchat_id = test_input($_POST["erchat_id"]);
        $covid = test_input($_POST["covid"]);
        $username = test_input($_POST["username"]);
        $password11 = test_input($_POST["password1"]);
        $confirm_password = test_input($_POST["confirm_password"]);

        // Validations (add your validations here)
    
        if ($firstname == "") {
            $firstnameErr = "First Name is required!";
            $flag = 1;
        } else {
            echo "Welcome " . $firstname;
        }

        if ($lastname == "") {
            $lastnameErr = "Last name is required";
            $flag = 2;
        }

        if ($email == "") {
            $emailErr = "Email is required!";
            $flag = 3;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "invalid email format";
                $flag = 3;
            }
        }

        if ($phone == "" || $phone == "678-123-1234") {
            $phoneErr = "Phone is required";
            $flag = 4;
        }

        if (empty($password11)) {
            $passwordErr = "Password is required";
            $flag = 5;
        }

        if ($password11 != $confirm_password) {
            $confirm_passwordErr = "Passwords do not match";
            $flag = 6;
        }

        // If all validations pass, proceed to database operation
        if ($flag == 0) {
            include "connection.php";
            // Check if the v_id needs to be inserted
            $selectVIdQuery = "SELECT COUNT(*) as count FROM volunteer WHERE v_id = '$id'";
            $result = mysqli_query($dbc, $selectVIdQuery);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];

            if ($count == 0) {
                // v_id doesn't exist, so insert it
                $insertVIdQuery = "INSERT INTO volunteer (v_id) VALUES ('$id')";
                mysqli_query($dbc, $insertVIdQuery);
            }


            $qs = "UPDATE apath SET pw='$password11' 
            WHERE id='$id' ";
            $sqs = "UPDATE volunteer 
            SET first_name='$firstname', last_name='$lastname', 
                gender='$gender', affiliation='$affirec', email='$email', 
                phone='$phone', backphone='$phone2', wid='$erchat_id', 
                covid='$covid', username='$username'
            WHERE v_id='$id'";
            //run the query 
            mysqli_query($dbc, $qs);
            echo $sqs;
            mysqli_query($dbc, $sqs);
            if (mysqli_affected_rows($dbc) == 1) {
                echo "Volunteer information updated successfully!";
                mysqli_close($dbc);
                echo "<script> window.location.href='v_profile.php';</script>";
            } else {
                echo "Something is Wrong!" . mysqli_error($dbc);
            }


        } else {
            echo "error is: " . $flag;
        }
    }
    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
        <!-- Personal Information -->
        First Name: <input type="text" name="first_name"
            value="<?php echo isset($firstname) ? htmlspecialchars($firstname) : ''; ?>"> <span class="error">*
            <?php echo $firstnameErr; ?></span><br><br>
        Last Name: <input type="text" name="last_name"
            value="<?php echo isset($lastname) ? htmlspecialchars($lastname) : ''; ?>"> <span class="error">*
            <?php echo $lastnameErr; ?></span><br><br>

        <!-- Gender -->
        Gender:
        <span class="error">* <?php echo $genderErr; ?></span>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")
            echo "checked" ?>
                value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male")
            echo "checked" ?>
                value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other")
            echo "checked" ?>
                value="other">Other
            <br><br>
            Affiliation/Recommended by: <input type="text" name="affre"
                value="<?php echo isset($affirec) ? htmlspecialchars($affirec) : ''; ?>"><br><br>
        <!-- Contact Information -->
        E-mail: <input type="email" name="email"
            value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br><br>

        Cellphone: <input type="tel" name="phone"
            value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>"><br><br>

        Back phone number to contact you: <input type="tel" name="phone2"
            value="<?php echo isset($phone2) ? htmlspecialchars($phone2) : ''; ?>"><br><br>
        Wechat ID: <input type="text" name="erchat_id"
            value="<?php echo isset($erchat_id) ? htmlspecialchars($erchat_id) : ''; ?>"><br><br>

        <!-- COVID-19 -->
        Did you already get COVID vaccine?
        <input type="radio" name="covid" <?php if (isset($covid) && $covid == "yes")
            echo "checked" ?> value="yes">Yes
            <input type="radio" name="covid" <?php if (isset($covid) && $covid == "no")
            echo "checked" ?> value="no">No
            <br><br>

            <!-- Account Information -->
            Choose a Username: <input type="text" name="username"
                value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"><br><br>

        Password: <input type="password" name="password1"
            value="<?php echo isset($password11) ? htmlspecialchars($password11) : ''; ?>"><br><br>

        Confirm Password: <input type="password" name="confirm_password"
            value="<?php echo isset($confirm_password) ? htmlspecialchars($confirm_password) : ''; ?>"><br><br>

        <input type="submit" value="Submit">
    </form>


</body>

</html>