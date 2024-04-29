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
    <title>Profile</title>
</head>
<body>
<br>
  <h2>APATH</h2>
  <?php
  include("studentnav.php");
  
  ?>
  <?php
   include "input_test.php";

    $firstname = $lastname = $englishname = $gender = $family = $student_type = $purpose =$major= $email = $phone = $WeChat_id = $covid = $username = $password = $confirm_password = $special_attention = $comments = "";
    $firstnameErr = $lastnameErr =$englishnameErr= $genderErr = $majorErr=$emailErr = $phoneErr = $passwordErr = $confirm_passwordErr = "";
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $englishname = test_input($_POST["englishname"]);
        $gender = test_input($_POST["gender"]);
        $family = test_input($_POST["family"]);
        $student_type = test_input($_POST["student_type"]);
        $purpose = test_input($_POST["purpose"]);
        $major = test_input($_POST["major"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $WeChat_id = test_input($_POST["WeChat_id"]);
        $covid = test_input($_POST["covid"]);
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        $confirm_password = test_input($_POST["confirm_password"]);
        $special_attention = test_input($_POST["special_attention"]);
        $comments = test_input($_POST["comments"]);

        // Validations (add your validations here)
        
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

        if (empty($password)) {
            $passwordErr = "Password is required";
        }

        if ($password != $confirm_password) {
            $confirm_passwordErr = "Passwords do not match";
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
                $sqs = "INSERT INTO student(s_id,firstname, lastname,gender,bfamily,stype,pvisit,major, email, phone, wechat_ID,hcovid,sattention,comments) 
                VALUES('$id','$firstname','$lastname','$gender','$family','$student_type','$purpose','$major','$email','$phone','$WeChat_id','$covid','$special_attention','$comments')";
                mysqli_query($dbc, $sqs);
                $registerd = mysqli_affected_rows($dbc);
                echo $registerd . " Personal Profile updated successfully <br>";
                mysqli_close($dbc);
                //header("Location: student_profile.php");
                 echo "<script> window.location.href='student_profile.php';</script>";

            }
        }
    }
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
    <!-- Personal Information -->
    First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"> <span class="error">*
            <?php echo $firstnameErr; ?></span><br><br>
    Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"> <span class="error">*
            <?php echo $lastnameErr; ?></span><br><br>

    English Name (if any): <input type="text" name="englishname" value="<?php echo $englishname; ?>"> <span class="error">*
            <?php echo $englishnameErr; ?></span><br><br>

    <!-- Gender -->
    Gender: 
    <span class="error">* <?php echo $genderErr; ?></span><br>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked" ?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked" ?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked" ?> value="other">Other
    <br><br>

    <!-- Family and Student Type -->
    Bringing Family:
    <input type="radio" name="family" <?php if (isset($family) && $family == "yes") echo "checked" ?> value="yes">Yes
    <input type="radio" name="family" <?php if (isset($family) && $family == "no") echo "checked" ?> value="no">No
    <br><br>

    Student Type:
    <input type="radio" name="student_type" <?php if (isset($student_type) && $student_type == "return") echo "checked" ?> value="return">Returning Student
    <input type="radio" name="student_type" <?php if (isset($student_type) && $student_type == "first_time") echo "checked" ?> value="first_time">First-Time Student
    <br><br>

    <!-- Purpose of Visit -->
    Purpose of Visit:
    <select name="purpose">
        <option value="select">-- Select --</option>
        <option value="undergraduate" <?php if (isset($purpose) && $purpose == "undergraduate") echo "selected" ?>>Undergraduate</option>
        <option value="graduate" <?php if (isset($purpose) && $purpose == "graduate") echo "selected" ?>>Graduate</option>
        <option value="visiting_scholar" <?php if (isset($purpose) && $purpose == "visiting_scholar") echo "selected" ?>>Visiting Scholar</option>
        <option value="other" <?php if (isset($purpose) && $purpose == "other") echo "selected" ?>>Other</option>
    </select>
    <br><br>

    <!-- Contact Information -->
    Major <input type="text" name="major" value="<?php echo isset($major) ? htmlspecialchars($major) : ''; ?>"><br><br>

    E-mail: <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br><br>

    Phone: <input type="tel" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>"><br><br>

    WeChat ID: <input type="text" name="WeChat_id" value="<?php echo isset($WeChat_id) ? htmlspecialchars($WeChat_id) : ''; ?>"><br><br>

    <!-- COVID-19 -->
    Had COVID-19:
    <input type="radio" name="covid" <?php if (isset($covid) && $covid == "yes") echo "checked" ?> value="yes">Yes
    <input type="radio" name="covid" <?php if (isset($covid) && $covid == "no") echo "checked" ?> value="no">No
    <br><br>

    <!-- Account Information -->
    Choose a Username: <input type="text" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"><br><br>

    Password: <input type="password" name="password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>"><br><br>

    Confirm Password: <input type="password" name="confirm_password" value="<?php echo isset($confirm_password) ? htmlspecialchars($confirm_password) : ''; ?>"><br><br>

    <!-- Special Attention -->
    Special Attention Needed:
    <input type="radio" name="special_attention" <?php if (isset($special_attention) && $special_attention == "yes") echo "checked" ?> value="yes">Yes
    <input type="radio" name="special_attention" <?php if (isset($special_attention) && $special_attention == "no") echo "checked" ?> value="no">No
    <br><br>

    <!-- Comments -->
    Comments: <textarea name="comments" rows="4" cols="50"><?php echo isset($comments) ? htmlspecialchars($comments) : ''; ?></textarea><br><br>

    <input type="submit" value="Submit">
</form>

    
</body>
</html>