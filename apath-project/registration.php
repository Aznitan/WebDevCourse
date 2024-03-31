<html>

<head>

  <link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>
  <br>
  <h2>APATH</h2>
  <?php
  include("navigationbar.php");
  
  ?>

  <br>
  <p>
    We are going to communicate with you using email often.
    <br>
    Please create your new account with your most frequently used email.
  </p>
  <?php
  function test_input($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = "Email";
  $passw = "Password";
  $passw2 = "Password";
  $flag = 0;
  $useerType="";
  $flag= 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    if (isset($_POST['useerType'])) {
      $useerType = $_POST['useerType'];
     }
     $passw = test_input($_POST["passw"]);
     $passw2 = test_input($_POST["passw1"]);

     if ($passw == "") {
         $flag = 1;
     } else {
         if ($passw != $passw2) {
             $flag = 2;
         }
     }


     if ($flag == 0) {
      include "connection.php";
      // check email to make sure is NOT in our DB table 
      $sqs = "SELECT * from apath WHERE email = '$email' ";
      $qresult = mysqli_query($dbc, $sqs);
      $num = mysqli_num_rows($qresult);
      if ($num != 0) {
          echo "<br><h3>Email has been used! Please Try a different email</h3></br>";
      } else {
          $sqs = "INSERT INTO apath(email, pw,usertype ) VALUES('$email','$passw','$useerType' )";
          mysqli_query($dbc, $sqs);
          $registerd = mysqli_affected_rows($dbc);
          echo $registerd . " resgistration is successful <br>";
          mysqli_close($dbc);
          header("Location: registration.php");

      }
  }



  }
  ?>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
      <input type="email" name="email" value="<?php echo $email; ?>"><span class="error">
      <br><br>
      <input type="password" name="passw" value="<?php echo $passw; ?>"> <span class="error">
        <br><br>
        <input type="password" name="passw1" value="<?php echo $passw; ?>"><span class="error">
        <br><br>
        
        <input type="radio" name="useerType" <?php if (isset($useerType) && $useerType == 1)
          echo "checked" ?>
            value=1> I am signing up as a volunteer
      <br>
          <input type="radio" name="useerType" <?php if (isset($useerType) && $useerType == 2)
          echo "checked" ?>
            value=2>I’m an international students that need help
            
      

          <br><br>
          <input type="submit">
    </form>

    <br>
    <p>Already Have an Account?<a href="index.php">Login</a></p>



<br><br><br><br>
  <p>Submitted by Luis Fabela</p>






  </body>

  </html>