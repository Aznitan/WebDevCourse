<?php
session_start();
$id = $_SESSION["id"];
echo "session id is " . $id . "<br>"; // for developers
?>
<html>

<head>
    <title>Online Test PHP</title>
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
        
        table {
            margin: auto;
            border-collapse: collapse;
            text-align: center;
        }

        table td {
            padding: 10px;
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <h2>Welcome to the Free online Test</h2>
    <?php
    include "user_navbar.php";
    ?>
    <h3>Here is your assessment result</h3>
    <?php
    include "connection.php";
    $qs = "SELECT * FROM users WHERE id = $id";
    // echo $qs for developer 
    $qresult = mysqli_query($dbc, $qs);
    $numrows = mysqli_num_rows($qresult);
    if ($numrows == 1) {
        $row = mysqli_fetch_array($qresult);
        $html = $row["quiz1"]; // make sure you match with your database
        $quiz2= $row["quiz2"];
        $quiz3= $row["quiz3"];
        $quiz4= $row["quiz4"];
        echo "<br><table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> PHP result:" .$html."/100";
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";
        
        echo "<table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> SQL result:" .$quiz2 ."/100";
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";

        echo "<table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> HTML/CSS result:" . $quiz3."/100";
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";

        echo "<table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> JavaScript result:" . $quiz4."/100";
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";

        // $average= $html/4// all the grades  / 4 
        // if ($average>=90){
        //     $msg = "Your overall skill level in Web Dev is Excellent. <br>
        //     I would recommend you to browse the available positions on our website and start to work"
        //     ;
        // }elseif ($average >=80){
        //     $msg= "your overall skill in Web Dev is Ok.";
        // }
        // elseif ($average >=70){
        //     $msg= "your overall skill in Web Dev could be inproved.";
        // }
        // else{
        //     $msg = "YOu are a begginner at Web Dev. We recommend you to continue Learning using the Training resources."
        // }

    }

    ?>

</body>

</html>