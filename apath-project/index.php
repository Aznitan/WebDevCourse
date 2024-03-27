<?php
session_start();

?>
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

  
  <?php

  $email=$dbfirstname="";
  include "input_test.php";
  

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $passw = test_input($_POST["pw"]);
    include "connection.php";
    $qs = "SELECT * FROM apath WHERE email='$email' ";
        $qresult = mysqli_query($dbc, $qs);
        $numrows = mysqli_num_rows($qresult);

        if ($numrows == 1) {
          $row = mysqli_fetch_array($qresult);
     
          $dbpw = $row["pw"];
          $usertype = $row["usertype"];
          $dbid=$row["id"];
          $_SESSION["id"] = $dbid;
          
          if ($passw == $dbpw) {
              echo "Welcome to our website,<br>";
              mysqli_close($dbc);
              if($usertype == 0){
                  // header("Location: admin_home.php");
                  echo "<script> window.location.href='admin_home.php';</script>";
              }
              if($usertype == 1){
                // header("Location: admin_home.php");
                echo "<script> window.location.href='v_home.php';</script>";
            }
              else{
              // header("Location: user_home.php");
              echo "<script> window.location.href='student_home.php';</script>";
              }

          } else {
              echo "Sorry your Password is not correct! Please Try Again...";
          }
      } elseif ($numrows == 0) {
          echo "Email is not in out system. Please register first!";
      } else {
          echo "Something happended with our system please try again later!";
      }


  }
  ?>


 <h2>Welcome to Apath</h1>
    <p>If you have an account with us, please login.</p>
    <p>Otherwise, please <a href="registration.php">sign up</a></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"class="form-container">
        Email: <input type="text" name="email" maxlength="50"> <br><br>
        Password: <input type="password" name="pw" maxlength="20"> <br><br>

        <input type="submit" name="submit" id="Login">
    </form>





<br><br><br><br>
  <p>Submitted by Luis Fabela</p>






  </body>

  </html>