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
    I’m an international students that need help;
    <br>
    also, I recommend a confirm pw field
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
  $volunteer="";
  $gtech="";
  $flag= 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    if (isset($_POST['gtech'])) {
      $gtech = $_POST['gtech'];
     }
     $passw = test_input($_POST["password1"]);
     $passw2 = test_input($_POST["password2"]);

     if ($passw == "") {
         $flag = 7;
     } else {
         if ($passw != $passw2) {
             $flag = 8;
         }
     }


     if ($flag == 0) {
      include "connection.php";
      // check email to make sure is NOT in our DB table 
      $sqs = "SELECT * from apathregistration WHERE email = '$email' ";
      $qresult = mysqli_query($dbc, $sqs);
      $num = mysqli_num_rows($qresult);
      if ($num != 0) {
          echo "<br><h3>Email has been used! Please Try a different email</h3></br>";
      } else {
          $sqs = "INSERT INTO apath(email, passw) VALUES('$email','$passw' )";
          mysqli_query($dbc, $sqs);
          $registerd = mysqli_affected_rows($dbc);
          echo $registerd . " resgistration is successful <br>";
          mysqli_close($dbc);
          header("Location: registrationsuccessful.php");

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
        
        <input type="radio" name="volunteer" <?php if (isset($volunteer) && $volunteer == "volunteer")
          echo "checked" ?>
            value="volunteer"> I am signing up as a volunteer
            <br>
          <input type="radio" name="gtech" <?php if (isset($gtech) && $gtech == "gtech")
          echo "checked" ?>
            value="gtech">I am an international students that need help


          <br><br>
          <input type="submit">
    </form>




<br><br><br><br>
  <p>Submitted by Luis Fabela</p>






  </body>

  </html>