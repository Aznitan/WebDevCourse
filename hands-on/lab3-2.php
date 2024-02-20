<html>

<head>
    <title>Lab 3 2nd Form</title>
    <style>
        .question,
        h1,
        p {
            padding-left: 10rem;
        }
    </style>
</head>

<body>
    <h1>Lab3 Form 2 SQL Quiz</h1>
    <p>Submitted by Luis Fabela</p>
    <br>
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
            echo "<br>Welcome " . $name . "  Thanks for submitting the Quiz<br>";
        }

        if ($flag == 0) {
            include "SQLQuizConnection.php";
            $sqs = "INSERT INTO sqlquiz (name,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10) VALUES ('$name','$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7', '$Q8', '$Q9', '$Q10')";
            mysqli_query($dbc, $sqs);
            $registerd = mysqli_affected_rows($dbc);

        }

    }
    ?>



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="question">
            <br>
            Name: <input type="text" name="name" value="<?php echo $name; ?>"> <span class="error">*
                <?php echo $nameErr; ?>
            </span>
            <br><br>

            1. What SQL keyword is used to retrieve data from a database? <span class="error">
                <?php echo $Q1Err; ?>
            </span><br>
            <input type="radio" name="Q1" <?php if (isset($Q1) && $Q1 == "a")
                echo "checked"; ?> value="a">(a) FETCH <br>
            <input type="radio" name="Q1" <?php if (isset($Q1) && $Q1 == "b")
                echo "checked"; ?> value="b">(b) SELECT <br>
            <input type="radio" name="Q1" <?php if (isset($Q1) && $Q1 == "c")
                echo "checked"; ?> value="c">(c) RETRIEVE
            <br>
            <br>
            2. What SQL command is used to insert new data into a database table? <span class="error">
                <?php echo $Q2Err; ?>
            </span><br>
            <input type="radio" name="Q2" <?php if (isset($Q2) && $Q2 == "a")
                echo "checked"; ?> value="a">(a) ADD <br>
            <input type="radio" name="Q2" <?php if (isset($Q2) && $Q2 == "b")
                echo "checked"; ?> value="b">(b) INSERT INTO
            <br>
            <input type="radio" name="Q2" <?php if (isset($Q2) && $Q2 == "c")
                echo "checked"; ?> value="c">(c) UPDATE <br>
            <br>
            3. Which SQL clause is used to filter rows returned by a SELECT statement? <span class="error">
                <?php echo $Q3Err; ?>
            </span><br>
            <input type="radio" name="Q3" <?php if (isset($Q3) && $Q3 == "a")
                echo "checked"; ?> value="a">(a) GROUP BY
            <br>
            <input type="radio" name="Q3" <?php if (isset($Q3) && $Q3 == "b")
                echo "checked"; ?> value="b">(b) ORDER BY
            <br>
            <input type="radio" name="Q3" <?php if (isset($Q3) && $Q3 == "c")
                echo "checked"; ?> value="c">(c) WHERE <br>
            <br>
            4. What SQL function is used to find the number of rows in a table? <span class="error">
                <?php echo $Q4Err; ?>
            </span><br>
            <input type="radio" name="Q4" <?php if (isset($Q4) && $Q4 == "a")
                echo "checked"; ?> value="a">(a) COUNT(*)
            <br>
            <input type="radio" name="Q4" <?php if (isset($Q4) && $Q4 == "b")
                echo "checked"; ?> value="b">(b)
            TOTAL_ROWS()
            <br>
            <input type="radio" name="Q4" <?php if (isset($Q4) && $Q4 == "c")
                echo "checked"; ?> value="c">(c) ROW_COUNT()
            <br>
            <br>

            5. Which SQL keyword is used to eliminate duplicate records from the result set? <span class="error">
                <?php echo $Q5Err; ?>
            </span><br>
            <input type="radio" name="Q5" <?php if (isset($Q5) && $Q5 == "a")
                echo "checked"; ?> value="a">(a) UNIQUE <br>
            <input type="radio" name="Q5" <?php if (isset($Q5) && $Q5 == "b")
                echo "checked"; ?> value="b">(b) DISTINCT
            <br>
            <input type="radio" name="Q5" <?php if (isset($Q5) && $Q5 == "c")
                echo "checked"; ?> value="c">(c) DIFFERENT
            <br>
            <br>

            6. What SQL statement is used to modify data in a database table? <span class="error">
                <?php echo $Q6Err; ?>
            </span><br>
            <input type="radio" name="Q6" <?php if (isset($Q6) && $Q6 == "a")
                echo "checked"; ?> value="a">(a) CHANGE <br>
            <input type="radio" name="Q6" <?php if (isset($Q6) && $Q6 == "b")
                echo "checked"; ?> value="b">(b) MODIFY <br>
            <input type="radio" name="Q6" <?php if (isset($Q6) && $Q6 == "c")
                echo "checked"; ?> value="c">(c) UPDATE <br>
            <br>

            7.Which SQL clause is used to join rows from two or more tables based on a related column between them?
            <span class="error">
                <?php echo $Q7Err; ?>
            </span><br>
            <input type="radio" name="Q7" <?php if (isset($Q7) && $Q7 == "a")
                echo "checked"; ?> value="a">(a) ATTACH <br>
            <input type="radio" name="Q7" <?php if (isset($Q7) && $Q7 == "b")
                echo "checked"; ?> value="b">(b) MERGE <br>
            <input type="radio" name="Q7" <?php if (isset($Q7) && $Q7 == "c")
                echo "checked"; ?> value="c">(c) JOIN <br>
            <br>
            8.What SQL command is used to delete rows from a database table? <span class="error">
                <?php echo $Q8Err; ?>
            </span><br>
            <input type="radio" name="Q8" <?php if (isset($Q8) && $Q8 == "a")
                echo "checked"; ?> value="a">(a) REMOVE <br>
            <input type="radio" name="Q8" <?php if (isset($Q8) && $Q8 == "b")
                echo "checked"; ?> value="b">(b) DELETE FROM
            <br>
            <input type="radio" name="Q8" <?php if (isset($Q8) && $Q8 == "c")
                echo "checked"; ?> value="c">(c) ERASE <br>
            <br>
            9.Which SQL function is used to return the maximum value from a column? <span class="error">
                <?php echo $Q9Err; ?>
            </span><br>
            <input type="radio" name="Q9" <?php if (isset($Q9) && $Q9 == "a")
                echo "checked"; ?> value="a">(a) MAX() <br>
            <input type="radio" name="Q9" <?php if (isset($Q9) && $Q9 == "b")
                echo "checked"; ?> value="b">(b) LARGEST()
            <br>
            <input type="radio" name="Q9" <?php if (isset($Q9) && $Q9 == "c")
                echo "checked"; ?> value="c">(c) HIGHEST()
            <br>
            <br>
            10. What SQL clause is used to sort the result set in ascending or descending order? <span class="error">
                <?php echo $Q10Err; ?>
            </span><br>
            <input type="radio" name="Q10" <?php if (isset($Q10) && $Q10 == "a")
                echo "checked"; ?> value="a">(a) SORT BY
            <br>
            <input type="radio" name="Q10" <?php if (isset($Q10) && $Q10 == "b")
                echo "checked"; ?> value="b">(b) ARRANGE
            BY
            <br>
            <input type="radio" name="Q10" <?php if (isset($Q10) && $Q10 == "c")
                echo "checked"; ?> value="c">(c) ORDER BY
            <br>
            <br>
            <br>
            <input type="submit">
        </div>
    </form>










    </form>



</body>

</html>