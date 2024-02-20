<!DOCTYPE html>
<html>

<head>
    <title>JavaScript Quiz</title>
    <style>
        .question,
        h1,
        p {
            padding-left: 10rem;
        }
    </style>
</head>

<body>
    <h1>Lab4 JavaScript Quiz</h1>
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
            $sqs = "INSERT INTO javascriptquiz (name,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10) VALUES ('$name','$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7', '$Q8', '$Q9', '$Q10')";
            mysqli_query($dbc, $sqs);
            $registerd = mysqli_affected_rows($dbc);

        }



    }





    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="question">
            Name: <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">*
                <?php echo $nameErr; ?>
            </span>
            <br><br>

            1. What is the correct way to declare a variable in JavaScript?
            <span class="error">*
                <?php echo $Q1Err; ?>
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
                <?php echo $Q2Err; ?>
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
                <?php echo $Q3Err; ?>
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
                <?php echo $Q4Err; ?>
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
                <?php echo $Q5Err; ?>
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
                <?php echo $Q6Err; ?>
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
                <?php echo $Q7Err; ?>
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
                <?php echo $Q8Err; ?>
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
                <?php echo $Q9Err; ?>
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
                <?php echo $Q10Err; ?>
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
        </div>
    </form>
</body>

</html>