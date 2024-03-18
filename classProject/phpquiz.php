<?php
session_start();
$id = $_SESSION["id"];
echo "session id is " . $id . "<br>"; // for developers
?>

<html>

<head>
    <style>
        .error {
            color: #FF0000
        }

        p,
        h2 {
            text-align: center;
            padding-top: 4rem;
        }

        body {
            text-align: center;
        }

        form {
            display: inline-block;
            text-align: center;
        }
    </style>
    <title>ONline Test - PHP</title>
</head>

<body>
    <h2>Welcome to the Free online Test</h2>

    <?php
    include ("user_navbar.php");
    include ("input_test.php");
    $Q1Msg = $Q2Msg = $Q3Msg = $Q4Msg = $Q5Msg = $Q6Msg = $Q7Msg = $Q8Msg = $Q9Msg = $Q10Msg = "";
    $Q1 = $Q2 = $Q3 = $Q4 = $Q5 = $Q6 = $Q7 = $Q8 = $Q9 = $Q10 = "";

    $flag = 0;
    $quizScore = 0;

    //when user click submit button
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty ($_POST["Q1"])) {
            $Q1Msg = "You must answer this Question";
            $flag = 1;
        } else {
            $Q1 = test_input($_POST["Q1"]);
            if ($Q1 == "B") {
                $Q1Msg = "Correct";
                $quizScore++;
            } else {
                $Q1Msg = "Wrong!";
            }
        }

        if (empty ($_POST["Q2"])) {
            $Q2Msg = "You must answer this Question";
            $flag = 2;
        } else {
            $Q2 = test_input($_POST["Q2"]);
            if ($Q2 == "B") {
                $Q2Msg = "Correct";
                $quizScore++;
            } else {
                $Q2Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q3"])) {
            $Q3Msg = "You must answer this Question";
            $flag = 3;

        } else {
            $Q3 = test_input($_POST["Q3"]);
            if ($Q3 == "B") {
                $Q3Msg = "Correct";
                $quizScore++;
            } else {
                $Q3Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q4"])) {
            $Q4Msg = "You must answer this Question";
            $flag = 4;

        } else {
            $Q4 = test_input($_POST["Q4"]);
            if ($Q4 == "B") {
                $Q4Msg = "Correct";
                $quizScore++;
            } else {
                $Q40Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q5"])) {
            $Q5Msg = "You must answer this Question";
            $flag = 5;
        } else {
            $Q5 = test_input($_POST["Q5"]);
            if ($Q5 == "B") {
                $Q5Msg = "Correct";
                $quizScore++;
            } else {
                $Q5Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q6"])) {
            $Q6Msg = "You must answer this Question";
            $flag = 6;
        } else {
            $Q6 = test_input($_POST["Q6"]);
            if ($Q6 == "B") {
                $Q6Msg = "Correct";
                $quizScore++;
            } else {
                $Q6Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q7"])) {
            $Q7Msg = "You must answer this Question";
            $flag = 7;
        } else {
            $Q7 = test_input($_POST["Q7"]);
            if ($Q7 == "B") {
                $Q7Msg = "Correct";
                $quizScore++;
            } else {
                $Q7Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q8"])) {
            $Q8Msg = "You must answer this Question";
            $flag = 8;
        } else {
            $Q8 = test_input($_POST["Q8"]);
            if ($Q8 == "B") {
                $Q8Msg = "Correct";
                $quizScore++;
            } else {
                $Q8Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q9"])) {
            $Q9Msg = "You must answer this Question";
            $flag = 9;
        } else {
            $Q9 = test_input($_POST["Q9"]);
            if ($Q9 == "B") {
                $Q9Msg = "Correct";
                $quizScore++;
            } else {
                $Q9Msg = "Wrong!";
            }
        }
        if (empty ($_POST["Q10"])) {
            $Q10Msg = "You must answer this Question";
            $flag = 10;
        } else {
            $Q10 = test_input($_POST["Q10"]);
            if ($Q10 == "B") {
                $Q10Msg = "Correct";
                $quizScore++;
            } else {
                $Q10Msg = "Wrong!";
            }
        }

        echo "the flag error is " . $flag;
        $quizResult = $quizScore * 10;
        // if not red flag 
        if ($flag == 0) {
            //connect to DB
            include "connection.php";
            $qsq = "ALTER TABLE users ADD COLUMN quiz1 INT DEFAULT 0;";
            mysqli_query($dbc,$qsq);
            $qs = "UPDATE users SET quiz1 = $quizResult WHERE id = $id";
            echo "query is " . $qs; // for developer only
            $returnValue = mysqli_query($dbc, $qs);
            echo "return value is " . $returnValue; // for developer
    
            if ($returnValue) {
                $msg = "Thanks YOu! for completing the PHP assessment.";
            } else {
                $msg = "We cannot save your assessment result. Somethiing went Wrong ...";
            }
            echo $msg;

        }



    }

    ?>



    <p>Feeel Free to Access YOur PHP skills</p>
    <h1>PHP Questions</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        1. What does PHP stands for? <span class="error">*
            <?php echo $Q1Msg; ?>
        </span><br>
        <input type="radio" name="Q1" <?php if (isset ($Q1) && $Q1 == "A")
            echo "checked"; ?> value="A">Private Home Page
        <input type="radio" name="Q1" <?php if (isset ($Q1) && $Q1 == "B")
            echo "checked"; ?> value="B">Personal Hypertext
        Processor
        <input type="radio" name="Q1" <?php if (isset ($Q1) && $Q1 == "C")
            echo "checked"; ?> value="C">PHP
        <br><br>
        2. Which of the following tags is used to embed PHP code in HTML? <span class="error">*
            <?php echo $Q2Msg; ?>
        </span><br>
        <input type="radio" name="Q2" <?php if (isset ($Q2) && $Q2 == "A")
            echo "checked"; ?> value="A">(a) <'script'> <br>
            <input type="radio" name="Q2" <?php if (isset ($Q2) && $Q2 == "B")
                echo "checked"; ?> value="B">(b) <'php'> <br>
                <input type="radio" name="Q2" <?php if (isset ($Q2) && $Q2 == "C")
                    echo "checked"; ?> value="C">(c) <'?php'>
                    <br><br>
                    3. In PHP, how do you comment a single line of code? <span class="error">*
                        <?php echo $Q3Msg; ?>
                    </span><br>
                    <input type="radio" name="Q3" <?php if (isset ($Q3) && $Q3 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q3" <?php if (isset ($Q3) && $Q3 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q3" <?php if (isset ($Q3) && $Q3 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    4. What function is used to output text in PHP? <span class="error">*
                        <?php echo $Q4Msg; ?>
                    </span><br>
                    <input type="radio" name="Q4" <?php if (isset ($Q4) && $Q4 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q4" <?php if (isset ($Q4) && $Q4 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q4" <?php if (isset ($Q4) && $Q4 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    5. Which operator is used for concatenation in PHP? <span class="error">*
                        <?php echo $Q5Msg; ?>
                    </span><br>
                    <input type="radio" name="Q5" <?php if (isset ($Q5) && $Q5 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q5" <?php if (isset ($Q5) && $Q5 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q5" <?php if (isset ($Q5) && $Q5 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    6. What is the default file extension for a PHP file? <span class="error">*
                        <?php echo $Q6Msg; ?>
                    </span><br>
                    <input type="radio" name="Q6" <?php if (isset ($Q6) && $Q6 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q6" <?php if (isset ($Q6) && $Q6 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q6" <?php if (isset ($Q6) && $Q6 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    7. What is the purpose of the if statement in PHP? <span class="error">*
                        <?php echo $Q7Msg; ?>
                    </span><br>
                    <input type="radio" name="Q7" <?php if (isset ($Q7) && $Q7 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q7" <?php if (isset ($Q7) && $Q7 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q7" <?php if (isset ($Q7) && $Q7 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    8. Which superglobal variable is used to collect form data after submitting an HTML form with
                    method="post"? <span class="error">*
                        <?php echo $Q8Msg; ?>
                    </span><br>
                    <input type="radio" name="Q8" <?php if (isset ($Q8) && $Q8 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q8" <?php if (isset ($Q8) && $Q8 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q8" <?php if (isset ($Q8) && $Q8 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    9. What does the acronym PDO stand for in the context of databases in PHP? <span class="error">*
                        <?php echo $Q9Msg; ?>
                    </span><br>
                    <input type="radio" name="Q9" <?php if (isset ($Q9) && $Q9 == "A")
                        echo "checked"; ?>
                        value="A">(a)Personal Home Page <br>
                    <input type="radio" name="Q9" <?php if (isset ($Q9) && $Q9 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q9" <?php if (isset ($Q9) && $Q9 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platformbr
                    <br><br>
                    10. How do you start a session in PHP? <span class="error">*
                        <?php echo $Q10Msg; ?>
                    </span><br>
                    <input type="radio" name="Q10" <?php if (isset ($Q10) && $Q10 == "A")
                        echo "checked"; ?> value="A">(a)
                    Personal Home Page <br>
                    <input type="radio" name="Q10" <?php if (isset ($Q10) && $Q10 == "B")
                        echo "checked"; ?> value="B">(b)
                    Hypertext Preprocessor <br>
                    <input type="radio" name="Q10" <?php if (isset ($Q10) && $Q10 == "C")
                        echo "checked"; ?> value="C">(c)
                    Public Hosting Platform <br>

                    <br><br>
                    <br>
                    <input type="submit">
    </form>


</body>

</html>