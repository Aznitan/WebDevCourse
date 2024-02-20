<html>

<head>
    <title>HTML/CSS QUIZ</title>
    <style>
        .question,
        h1,
        p {
            padding-left: 10rem;
        }
    </style>
</head>

<body>
    <h1>Lab4 HTML/CSS Quiz</h1>
    <p>Submitted by Luis Fabela</p>

    <?php
    $Q1Err = "";
    $Q2Err = "";
    $Q3Err = "";
    $Q4Err = "";
    $Q5Err = "";
    $Q6Err = "";
    $Q7Err = "";
    $Q8Err = "";
    $Q9Err = "";
    $Q10Err = "";
    $Q1 = "";
    $Q2 = "";
    $Q3 = "";
    $Q4 = "";
    $Q5 = "";
    $Q6 = "";
    $Q7 = "";
    $Q8 = "";
    $Q9 = "";
    $Q10 = "";
    $sqs = "";
    $name = "";
    $nameErr = "";
    $flag = 0;

    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $Q1 = ($_POST["Q1"]);
        $Q2 = ($_POST["Q2"]);
        $Q3 = ($_POST["Q3"]);
        $Q4 = ($_POST["Q4"]);
        $Q5 = ($_POST["Q5"]);
        $Q6 = ($_POST["Q6"]);
        $Q7 = ($_POST["Q7"]);
        $Q8 = ($_POST["Q8"]);
        $Q9 = ($_POST["Q9"]);
        $Q10 = ($_POST["Q10"]);

        if ($Q1 == "") {
            $Q1Err = "Answer is required!";
            $flag = 1;
        }
        if ($Q2 == "") {
            $Q2Err = "Answer is required!";
            $flag = 2;
        }

        if ($Q3 == "") {
            $Q3Err = "Answer is required!";
            $flag = 3;
        }

        if ($Q4 == "") {
            $Q4Err = "Answer is required!";
            $flag = 4;
        }

        if ($Q5 == "") {
            $Q5Err = "Answer is required!";
            $flag = 5;
        }

        if ($Q6 == "") {
            $Q6Err = "Answer is required!";
            $flag = 6;
        }

        if ($Q7 == "") {
            $Q7Err = "Answer is required!";
            $flag = 7;
        }

        if ($Q8 == "") {
            $Q8Err = "Answer is required!";
            $flag = 8;
        }

        if ($Q9 == "") {
            $Q9Err = "Answer is required!";
            $flag = 9;
        }

        if ($Q10 == "") {
            $Q10Err = "Answer is required!";
            $flag = 10;
        }
        if ($name == "") {
            $nameErr = "Name is required!";
            $flag = 11;
        } else {
            echo "<br>Welcome " . $name . "Thanks for submitting the Quiz<br>";
        }

        if ($flag == 0) {
            include "connection.php";
            $sqs = "INSERT INTO htmlquiz (name,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10) VALUES ('$name','$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7', '$Q8', '$Q9', '$Q10')";
            mysqli_query($dbc, $sqs);
            $registerd = mysqli_affected_rows($dbc);

        }



    }





    ?> 

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="question">
            Name: <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">*
                <?php echo $nameErr; ?>
            </span>
            <br><br> 

            1. What does HTML stand for?
            <span class="error">*
                <?php echo $Q1Err; ?>
            </span><br>
            <input type="radio" name="Q1" value="a">(a) Hyperlinks and Text Markup Language <br>
            <input type="radio" name="Q1" value="b">(b) Hypertext Markup Language <br>
            <input type="radio" name="Q1" value="c">(c) High Tech Markup Language <br><br>


            2. Which HTML tag is used to create a hyperlink?
            <span class="error">*
                <?php echo $Q2Err; ?>
            </span><br>
            <input type="radio" name="Q2" value="a">(a) &lt;link&gt; <br>
            <input type="radio" name="Q2" value="b">(b) &lt;a&gt; <br>
            <input type="radio" name="Q2" value="c">(c) &lt;hyperlink&gt; <br><br>


            3. What is the correct CSS property to change the color of text?
            <span class="error">*
                <?php echo $Q3Err; ?> 
            </span><br>
            <input type="radio" name="Q3" value="a">(a) text-color <br>
            <input type="radio" name="Q3" value="b">(b) color <br>
            <input type="radio" name="Q3" value="c">(c) font-color <br><br>


            4. Which of the following is an inline element in HTML?
            <span class="error">*
                <?php echo $Q4Err; ?>
            </span><br>
            <input type="radio" name="Q4" value="a">(a) &lt;div&gt; <br>
            <input type="radio" name="Q4" value="b">(b) &lt;p&gt; <br>
            <input type="radio" name="Q4" value="c">(c) &lt;section&gt; <br><br>


            5. Which HTML tag is used to create an unordered list?
            <span class="error">*
                <?php echo $Q5Err; ?>
            </span><br>
            <input type="radio" name="Q5" value="a">(a) &lt;ol&gt; <br>
            <input type="radio" name="Q5" value="b">(b) &lt;ul&gt; <br>
            <input type="radio" name="Q5" value="c">(c) &lt;li&gt; <br><br>

            6. What is the correct CSS property to set the background color of an element?
            <span class="error">*
                <?php echo $Q6Err; ?>
            </span><br>
            <input type="radio" name="Q6" value="a">(a) background-color <br>
            <input type="radio" name="Q6" value="b">(b) bg-color <br>
            <input type="radio" name="Q6" value="c">(c) color-background <br><br>


            7. Which of the following is used to add comments in HTML?
            <span class="error">*
                <?php echo $Q7Err; ?>
            </span><br>
            <input type="radio" name="Q7" value="a">(a) &lt;!-- comment --&gt; <br>
            <input type="radio" name="Q7" value="b">(b) // comment <br>
            <input type="radio" name="Q7" value="c">(c) /* comment */ <br><br>


            8. Which CSS property is used to set the font size of text?
            <span class="error">*
                <?php echo $Q8Err; ?>
            </span><br>
            <input type="radio" name="Q8" value="a">(a) font-size <br>
            <input type="radio" name="Q8" value="b">(b) text-size <br>
            <input type="radio" name="Q8" value="c">(c) size-font <br><br>

            9. What does CSS stand for?
            <span class="error">*
                <?php echo $Q9Err; ?>
            </span><br>
            <input type="radio" name="Q9" value="a">(a) Cascading Style Sheets <br>
            <input type="radio" name="Q9" value="b">(b) Computer Style Sheets <br>
            <input type="radio" name="Q9" value="c">(c) Creative Style Sheets <br><br>


            10. Which HTML tag is used to define a table row?
            <span class="error">*
                <?php echo $Q10Err; ?>
            </span><br>
            <input type="radio" name="Q10" value="a">(a) &lt;row&gt; <br>
            <input type="radio" name="Q10" value="b">(b) &lt;tr&gt; <br>
            <input type="radio" name="Q10" value="c">(c) &lt;table-row&gt; <br><br>

            <input type="submit">
        </div>
    </form>
</body>

</html>