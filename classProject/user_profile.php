<?php
session_start();
$id = $_SESSION["id"];
echo "session id is " . $id . "<br>"; // for developers
include "connection.php";
$qs = "SELECT * FROM users WHERE id = '$id'";
// echo query statement

$result = mysqli_query($dbc, $qs);
$numrows = mysqli_num_rows($result);
if ($numrows == 1) {
    $row = mysqli_fetch_array($result);
    $dbid=$row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    $major = $row["major"];
    $phone = $row["phone"];
    $pass = $row["pw"];
    $gender = $row["gender"];
} else {
    echo "Something is Wrong! ";
}
?>
<?php
include "input_test.php";
    $flag=0;
    $genderErr="";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $major = test_input($_POST["major"]);
        $gender = test_input($_POST["gender"]);

        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }

        if ($firstname == "") {
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
            // check email to make sure is NOT in our table 
            $sqs = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email' , 
        phone = '$phone' , major = '$major' , gender = '$gender' , pw = '$password1' WHERE id = $id";

            echo "Update statement is : ".$qs."<br>";

            mysqli_query($dbc, $sqs);

            if (mysqli_affected_rows($dbc) == 1) {
                echo "You have updated your personal profile successful";
                echo"";
            }
            else{
                echo "Something is wrong!";
            }
            
            $qresult = mysqli_query($dbc, $sqs);
            if ($qresult !== false) {
                $num = mysqli_num_rows($qresult);
                if ($num != 0) {
                    echo "<br><h3>Email has been used! Please Try a different email</h3></br>";
                    } 
                else {
                $sqs = "INSERT INTO users(firstname, lastname, email, phone, major, gender, pw) VALUES('$firstname','$lastname','$email','$phone','$major','$gender','$password1' )";
                mysqli_query($dbc, $sqs);
                $registerd = mysqli_affected_rows($dbc);
                echo $registerd . " resgistration is successful <br>";
                mysqli_close($dbc);
                header("Location: registrationsuccessful.php");

                }
            }
        }


    }
?>
<html>

<head>
    <title>Online Test - User Profile</title>
    <style>
          p,h2{
                text-align: center;
                padding-top: 3rem;
            }
            body {
                text-align: center;
            }
            form {
                display: inline-block;
                text-align: center;
            }
    </style>
</head>

<body>
    <h2>Welcome to the Free Online Test </h2>
    <?php 
    include "user_navbar.php";
    ?>
    <p>Fell free to update your personal profile.</p>

    
<form action="user_profile.php" method ="post">
   ID : <input type = "text" name="id" value ="<?php echo $dbid?>"> <br><br>
   First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
   Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
   Email: <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
   Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
   Major: <input type="text" name="major" value="<?php echo $major ?>"><br><br> 
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

   Password: <input type="password" name="password1" value="<?php echo $pass ?>"><br><br> 
   Confirm Password: <input type="password" name="password2" value="<?php echo $pass ?>"><br><br> 

   <input type="submit" name="Update" value="Update Profile">      

</form>


</body>

</html>