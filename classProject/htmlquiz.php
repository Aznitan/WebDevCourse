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
            $qsq = "ALTER TABLE users ADD COLUMN quiz3 INT DEFAULT 0;";
            mysqli_query($dbc,$qsq);
            $qs = "UPDATE users SET quiz3 = $quizResult WHERE id = $id";
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



    <p>Feeel Free to Access Your HTML/CSS skills</p>
    <h1>HTML/CSS Questions</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    1. What does HTML stand for?
            <span class="error">*
                <?php echo $Q1Msg; ?>
            </span><br>
            <input type="radio" name="Q1" value="a">(a) Hyperlinks and Text Markup Language <br>
            <input type="radio" name="Q1" value="b">(b) Hypertext Markup Language <br>
            <input type="radio" name="Q1" value="c">(c) High Tech Markup Language <br><br>


            2. Which HTML tag is used to create a hyperlink?
            <span class="error">*
                <?php echo $Q2Msg; ?>
            </span><br>
            <input type="radio" name="Q2" value="a">(a) &lt;link&gt; <br>
            <input type="radio" name="Q2" value="b">(b) &lt;a&gt; <br>
            <input type="radio" name="Q2" value="c">(c) &lt;hyperlink&gt; <br><br>


            3. What is the correct CSS property to change the color of text?
            <span class="error">*
                <?php echo $Q3Msg; ?> 
            </span><br>
            <input type="radio" name="Q3" value="a">(a) text-color <br>
            <input type="radio" name="Q3" value="b">(b) color <br>
            <input type="radio" name="Q3" value="c">(c) font-color <br><br>


            4. Which of the following is an inline element in HTML?
            <span class="error">*
                <?php echo $Q4Msg; ?>
            </span><br>
            <input type="radio" name="Q4" value="a">(a) &lt;div&gt; <br>
            <input type="radio" name="Q4" value="b">(b) &lt;p&gt; <br>
            <input type="radio" name="Q4" value="c">(c) &lt;section&gt; <br><br>


            5. Which HTML tag is used to create an unordered list?
            <span class="error">*
                <?php echo $Q5Msg; ?>
            </span><br>
            <input type="radio" name="Q5" value="a">(a) &lt;ol&gt; <br>
            <input type="radio" name="Q5" value="b">(b) &lt;ul&gt; <br>
            <input type="radio" name="Q5" value="c">(c) &lt;li&gt; <br><br>

            6. What is the correct CSS property to set the background color of an element?
            <span class="error">*
                <?php echo $Q6Msg; ?>
            </span><br>
            <input type="radio" name="Q6" value="a">(a) background-color <br>
            <input type="radio" name="Q6" value="b">(b) bg-color <br>
            <input type="radio" name="Q6" value="c">(c) color-background <br><br>


            7. Which of the following is used to add comments in HTML?
            <span class="error">*
                <?php echo $Q7Msg; ?>
            </span><br>
            <input type="radio" name="Q7" value="a">(a) &lt;!-- comment --&gt; <br>
            <input type="radio" name="Q7" value="b">(b) // comment <br>
            <input type="radio" name="Q7" value="c">(c) /* comment */ <br><br>


            8. Which CSS property is used to set the font size of text?
            <span class="error">*
                <?php echo $Q8Msg; ?>
            </span><br>
            <input type="radio" name="Q8" value="a">(a) font-size <br>
            <input type="radio" name="Q8" value="b">(b) text-size <br>
            <input type="radio" name="Q8" value="c">(c) size-font <br><br>

            9. What does CSS stand for?
            <span class="error">*
                <?php echo $Q9Msg; ?>
            </span><br>
            <input type="radio" name="Q9" value="a">(a) Cascading Style Sheets <br>
            <input type="radio" name="Q9" value="b">(b) Computer Style Sheets <br>
            <input type="radio" name="Q9" value="c">(c) Creative Style Sheets <br><br>


            10. Which HTML tag is used to define a table row?
            <span class="error">*
                <?php echo $Q10Msg; ?>
            </span><br>
            <input type="radio" name="Q10" value="a">(a) &lt;row&gt; <br>
            <input type="radio" name="Q10" value="b">(b) &lt;tr&gt; <br>
            <input type="radio" name="Q10" value="c">(c) &lt;table-row&gt; <br><br>

            <input type="submit">
    </form>


</body>

</html>