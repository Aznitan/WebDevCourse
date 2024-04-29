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
        $username = test_input($_POST["username"]);
        $password11 = test_input($_POST["password1"]);
        $confirm_password = test_input($_POST["confirm_password"]);
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

            $sqs = "SELECT * from apath WHERE id = '$id' ";
            $qresult = mysqli_query($dbc, $sqs);
            $num = mysqli_num_rows($qresult);
            if ($num == 0) {
                echo "<br><h3>User Profile already filled up</h3></br>" . $flag;
            } else {
                $sqs = "INSERT INTO adminapath( lastname,firstname,gender,afiliation,email,cellphone, username) 
                VALUES('$lastname','$firstname','$gender','$affirec','$email','$phone','$username')";
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