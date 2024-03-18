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
    <title>Online Test - PHP</title>
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
                $quizScore+1;
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
            $qsq = "ALTER TABLE users ADD COLUMN quiz4 INT DEFAULT 0;";
            mysqli_query($dbc,$qsq);
            $qs = "UPDATE users SET quiz4 = $quizResult WHERE id = $id";
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



    <p>Feeel Free to Access Your JavaScript skills</p>
    <h1>JavaScript Questions</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       
    1. What is the correct way to declare a variable in JavaScript?
            <span class="error">*
                <?php echo $Q1Msg; ?>
            </span><br>
            <input type="radio" name="Q1" <?php if (isset($Q1) && $Q1 == "a")
                echo "checked"; ?> value="a">(a) var myVar;
            <br>
            <input type="radio" name="Q1" <?php if (isset($Q1) && $Q1 == "b")
                echo "checked"; ?> value="b">(b) let myVar;
            <br>
            <input type="radio" name="Q1" <?php if (isset($Q1) && $Q1 == "c")
                echo "checked"; ?> value="c">(c) const
            myVar; <br><br>

            2.How do you add a comment in JavaScript?
            <span class="error">*
                <?php echo $Q2Msg; ?>
            </span><br>
            <input type="radio" name="Q2" <?php if (isset($Q2) && $Q2 == "a")
                echo "checked"; ?> value="a">(a)
            &lt;!-- comment --&gt;<br>
            <input type="radio" name="Q2" <?php if (isset($Q2) && $Q2 == "b")
                echo "checked"; ?> value="b">(b) // This is
            a comment <br>
            <input type="radio" name="Q2" <?php if (isset($Q2) && $Q2 == "c")
                echo "checked"; ?> value="c">(c) /* This is
            a comment */ <br><br>

            3. Which method is used to add a new element at the end of an array?
            <span class="error">*
                <?php echo $Q3Msg; ?>
            </span><br>
            <input type="radio" name="Q3" <?php if (isset($Q3) && $Q3 == "a")
                echo "checked"; ?> value="a">(a) append()
            <br>
            <input type="radio" name="Q3" <?php if (isset($Q3) && $Q3 == "b")
                echo "checked"; ?> value="b">(b) push() <br>
            <input type="radio" name="Q3" <?php if (isset($Q3) && $Q3 == "c")
                echo "checked"; ?> value="c">(c) addToEnd()
            <br><br>

            4. What does the "===" operator do in JavaScript?
            <span class="error">*
                <?php echo $Q4Msg; ?>
            </span><br>
            <input type="radio" name="Q4" <?php if (isset($Q4) && $Q4 == "a")
                echo "checked"; ?> value="a">(a) Checks for
            equality, including type <br>
            <input type="radio" name="Q4" <?php if (isset($Q4) && $Q4 == "b")
                echo "checked"; ?> value="b">(b) Assigns a
            value to a variable <br>
            <input type="radio" name="Q4" <?php if (isset($Q4) && $Q4 == "c")
                echo "checked"; ?> value="c">(c) Checks for
            equality, excluding type <br><br>

            5. How do you access the fifth element in an array called "myArray"?
            <span class="error">*
                <?php echo $Q5Msg; ?>
            </span><br>
            <input type="radio" name="Q5" <?php if (isset($Q5) && $Q5 == "a")
                echo "checked"; ?> value="a">(a) myArray[4]
            <br>
            <input type="radio" name="Q5" <?php if (isset($Q5) && $Q5 == "b")
                echo "checked"; ?> value="b">(b) myArray[5]
            <br>
            <input type="radio" name="Q5" <?php if (isset($Q5) && $Q5 == "c")
                echo "checked"; ?> value="c">(c) myArray(5)
            <br><br>

            6. Which keyword is used to define a function in JavaScript?
            <span class="error">*
                <?php echo $Q6Msg; ?>
            </span><br>
            <input type="radio" name="Q6" <?php if (isset($Q6) && $Q6 == "a")
                echo "checked"; ?> value="a">(a) func <br>
            <input type="radio" name="Q6" <?php if (isset($Q6) && $Q6 == "b")
                echo "checked"; ?> value="b">(b) function
            <br>
            <input type="radio" name="Q6" <?php if (isset($Q6) && $Q6 == "c")
                echo "checked"; ?> value="c">(c) define
            <br><br>

            7. What method is used to remove the last element of an array in JavaScript?
            <span class="error">*
                <?php echo $Q7Msg; ?>
            </span><br>
            <input type="radio" name="Q7" <?php if (isset($Q7) && $Q7 == "a")
                echo "checked"; ?> value="a">(a) pop() <br>
            <input type="radio" name="Q7" <?php if (isset($Q7) && $Q7 == "b")
                echo "checked"; ?> value="b">(b)
            removeLast() <br>
            <input type="radio" name="Q7" <?php if (isset($Q7) && $Q7 == "c")
                echo "checked"; ?> value="c">(c)
            deleteLast() <br><br>

            8. What is the correct way to write an if statement in JavaScript?
            <span class="error">*
                <?php echo $Q8Msg; ?>
            </span><br>
            <input type="radio" name="Q8" <?php if (isset($Q8) && $Q8 == "a")
                echo "checked"; ?> value="a">(a) if (x ===
            5) { } <br>
            <input type="radio" name="Q8" <?php if (isset($Q8) && $Q8 == "b")
                echo "checked"; ?> value="b">(b) if x === 5
            then { } <br>
            <input type="radio" name="Q8" <?php if (isset($Q8) && $Q8 == "c")
                echo "checked"; ?> value="c">(c) if x = 5 {
            } <br><br>

            9. Which method is used to convert a string to lowercase in JavaScript?
            <span class="error">*
                <?php echo $Q9Msg; ?>
            </span><br>
            <input type="radio" name="Q9" <?php if (isset($Q9) && $Q9 == "a")
                echo "checked"; ?> value="a">(a)
            toLowerCase() <br>
            <input type="radio" name="Q9" <?php if (isset($Q9) && $Q9 == "b")
                echo "checked"; ?> value="b">(b) lowerCase()
            <br>
            <input type="radio" name="Q9" <?php if (isset($Q9) && $Q9 == "c")
                echo "checked"; ?> value="c">(c)
            convertLowerCase() <br><br>

            10. How do you declare a JavaScript function called "myFunction"?
            <span class="error">*
                <?php echo $Q10Msg; ?>
            </span><br>
            <input type="radio" name="Q10" <?php if (isset($Q10) && $Q10 == "a")
                echo "checked"; ?> value="a">(a) function
            = myFunction() { } <br>
            <input type="radio" name="Q10" <?php if (isset($Q10) && $Q10 == "b")
                echo "checked"; ?> value="b">(b) function
            myFunction() { } <br>
            <input type="radio" name="Q10" <?php if (isset($Q10) && $Q10 == "c")
                echo "checked"; ?> value="c">(c) var
            myFunction = function() { } <br><br>

            <br>
        <input type="submit">
    </form>


</body>

</html>