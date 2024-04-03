<?php
session_start();

?>
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
                text-align: center;
            }
    </style>
</head>

<body>
    <?php
    $email=$dbfirstname="";
    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $pw = test_input($_POST["pw"]);

        include "connection.php";
        // get email and password from the DB query the DB based on email 
        $qs = "SELECT * FROM users WHERE email='$email' ";
        $qresult = mysqli_query($dbc, $qs);
        $numrows = mysqli_num_rows($qresult);

        if ($numrows == 1) {
            $row = mysqli_fetch_array($qresult);
            $dbfirstname = $row["firstname"];
            $dblastname = $row["lastname"];
            $dbpw = $row["pw"];
            $user_type = $row["user_type"];
            $dbid=$row["id"];
            $_SESSION["id"] = $dbid;
            $_SESSION["firstname"] = $dbfirstname;
            //on April 2 2024 hash on pass for more security
            $pwhash = password_hash($pw,PASSWORD_DEFAULT);
            $dbpwhash = password_hash($dbpw,PASSWORD_DEFAULT);
            // before if ($pw == $dbpw)
            $verify = password_verify($pw,$pwhash);
            if ($verify ) {
                echo "Welcome to our website, " . $dbfirstname . "<br>";
                mysqli_close($dbc);
                if($user_type == 0){
                    // header("Location: admin_home.php");
                    echo "<script> window.location.href='admin_home.php';</script>";

                }
                else{
                // header("Location: user_home.php");
                echo "<script> window.location.href='user_home.php';</script>";
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


    <h1>Activity 9-2: login form / index page</h1>
    <p>Submitted by Luis Fabela</p>
    <hr>
    <h1>Welcome to Jimmy's Free Online Testing Site</h1>
    <p>If you have an account with us, please login.</p>
    <p>Otherwise, please <a href="registration.php">sign up</a></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Email: <input type="text" name="email" maxlength="50"> <br><br>
        Password: <input type="password" name="pw" maxlength="20"> <br><br>

        <input type="submit" name="submit" id="Login">
    </form>
<h3>Testing Area </h3>
<p>Feb 20, 2024</p>
<ul>
    <li>genral user: login and take the quizzes</li>
    <li>admin user: login and manage the website</li>
</ul>


To Do:
<ol>
    <li>Update our database: need to add column: user_type</li>
    <li>create admin_nav.php</li>
    <li>Create admin functions to help manage the website</li>
</ol>
<?php
echo "for developer only<br>";
echo"Data collection from the form : <br >";
echo $email."<br>".$dbfirstname;

?>









</body>

</html>