<?php
session_start();
$id = $_SESSION["id"];
echo "session id is " . $id . "<br>"; // for developers
if(isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";
    // You might want to redirect the user to a login page or perform other actions here
}
?>


<html>
    <head>
        <title>Online Test - User Home</title>
        <style>
            h2 {
            text-align: center;
            padding-top: 4rem;
        }

        body,ul,li,ol{
            text-align: center;
        }

        .error {
            color: #FF0000
        }
            .error {color:#FF0000}
        </style>
    </head>
    <body>
        <h2>Welcome to the Free ONline Testing site </h2>
        <p>You will be able to assess your web dev skils using our test bank.</p>

    <?php
    include ("user_navbar.php");
    
    ?>
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

<p>
    Mrach 12: User Functions <br>
    1.user login (done)
    2.user profile(done)
    3.user assessment (taking quiz)
    4.check quiz results
    Homework
    <ul>
        <li>Add columns in the users table </li>
        <li>create a php quiz form </li>
        <li>Submit form to the databse</li>
    </ul>
    1.Make all quizzes work <br>
    2.display all quizess result in admin_display

</p>

    </body>
</html>