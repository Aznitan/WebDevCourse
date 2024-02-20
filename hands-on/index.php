<html>

<head>
    <title>Activity 9 Feb 13, 2024</title>
    <style>
        .error {
            color: #FF0000
        }
    </style>
</head>

<body>
    <?php
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
            if ($pw == $dbpw) {
                echo "Welcome to our website, " . $dbfirstname . "<br>";
                header("Location: user_navbar.php");

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











</body>

</html>