<html>

<head>
    <title>Encryption</title>
    <style>
        .error {
            color: #FF0000;
        }

        body,
        ol,
        li,
        ul {
            text-align: center;
        }
    </style>
</head>

<body>
    
    <h2>This activity will show you how to apply encryption.</h2>
    <p>Submited by Luis Fabela</p>
    <p>1. plain password</p>
    <p>2. md5() function</p>
    <p>3. adding salt to md5</p>
    <p>4. password_hash() function</p>
    <hr>
    <?php
    /*

    */
    $pw = "1111";
    echo "The original password String is " . $pw . "<br><br>";

    $pw1 = md5($pw);
    echo "The encrypted string with md5() function is " . $pw1 . "<br><br>";

    $salt ="abc@ggc.edu"; //any random String 

    echo "The salt String is ".$salt . " <br>";
    $pw2 = md5($salt.$pw);
    echo "The encrypted String using md5() and the salt is " . $pw2 . "<br><br>";
    
    $salt = md5($salt);
    echo"The new salt with md5() applied: " . $salt ."<br><br>";

    $pw3 = md5($salt.$pw);
    echo"The encrypted String with md5() fucntion and the salt also applied md5 ".$pw3."<br><br>";

    // using has function if it;s php5 or later 
    $pw4 = password_hash($pw,PASSWORD_DEFAULT);
    echo "The encrypted String using password_hash is: " . $pw4."<br><br>";
    echo "<h4> The encrypted String is very long. Make sure you check your database column for password.
    You need to have enough space/lenght to store the encrypted password</h4><br>"; 

    // check pw to see if it matches witrh the pw in the database
    $userinput="1112"; // just to check for the verify pw works 
    $verify = password_verify($pw,$pw4);    // (original pw , encrypted pw)
    if ($verify){
        echo"Password verifies successfully";
    }
    else{
        echo "Your password does not match with our records";
    }


    ?>



</body>


</html>