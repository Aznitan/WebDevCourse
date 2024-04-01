<html>

<head>
    <title>Activity 9 Feb 13, 2024</title>
    <style>
        .error {
            color: #FF0000
        }
        p,h2{
                text-align: center;
                padding-top: 3rem;
            }
            body {
                text-align: center;
            }
            form {
                display: inline-block;
            }
    </style>
</head>

<body>
    <h1>Activity 9: registration form </h1>
    <p>Submitted by Luis Fabela</p>

    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = "firstname";
    $lastname = "lastname";
    $email = "example@ggc.com";
    $phone = "678-123-1234";
    $major = $gender = $password1 = $password2 = "";
    $firstnameErr = $genderErr = $lastnameErr = $emailErr = $phoneErr = $majorErr = $password1Err = $password2Err = "";
    $flag = 0;




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $major = test_input($_POST["major"]);

        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }




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
        if ($major == "") {
            $majorErr = "Major is required";
            $flag = 5;
        }
        if ($gender == "") {
            $genderErr = "Gender is required!";
            $flag = 6;
        }
        $password1 = test_input($_POST["password1"]);
        $password2 = test_input($_POST["password2"]);

        if ($password1 == "") {
            $password1Err = "Password is required";
            $flag = 7;
        } else {
            if ($password1 != $password2) {
                $flag = 8;
                $password2Err = "Password Does not match";
            }
        }
        if ($flag == 0) {
            include "connection.php";
            // check email to make sure is NOT in our DB table 
            $sqs = "SELECT * from registration WHERE email = '$email' ";
            $qresult = mysqli_query($dbc, $sqs);
            $num = mysqli_num_rows($qresult);
            if ($num != 0) {
                echo "<br><h3>Email has been used! Please Try a different email</h3></br>";
            } else {
                $sqs = "INSERT INTO users(firstname, lastname, email, phone, major, gender, pw) VALUES('$firstname','$lastname','$email','$phone','$major','$gender','$password1' )";
                mysqli_query($dbc, $sqs);
                $registerd = mysqli_affected_rows($dbc);
                echo $registerd . " resgistration is successful <br>";
                mysqli_close($dbc);
                header("Location: registrationsuccessful.php");

            }
        }


    }

    ?>
        <p>Have an account? </p>
        <a href="index.php"><input type="button" value="Login"></a><br><br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"> <span class="error">*
            <?php echo $firstnameErr; ?>
        </span><br><br>
        Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"> <span class="error">*
            <?php echo $lastnameErr; ?>
        </span><br><br>
        Email: <input type="email" name="email" value="<?php echo $email; ?>"> <span class="error">*
            <?php echo $emailErr; ?>
        </span><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"> <span class="error">*
            <?php echo $phoneErr; ?>
        </span><br><br>
        Major: <input type="text" name="major" value="<?php echo $major ?>"> <span class="error">*
            <?php echo $majorErr; ?>
        </span><br><br>
        Gender: <span class="error">*
            <?php echo $genderErr ?>
        </span>
        <br>
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
            Password: <input type="password" name="password1" value="<?php echo $password1 ?>"><span class="error">*
            <?php echo $password1Err; ?> 1-15 characters
        </span>
        <br><br>
        Confirm Password: <input type="password" name="password2" value="<?php echo $password2 ?>"><span class="error">*
            <?php echo $password2Err; ?> 1-15 characters        
        </span>
        <br><br>
        <input type="submit">
        &nbsp;<br><br>
        

    </form>





</body>

</html>