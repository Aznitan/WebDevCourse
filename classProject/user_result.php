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
        echo "<br><table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> PHP result:" . $row["quiz1"];
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";
        
        echo "<table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> SQL result:" . $row["quiz2"];
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";

        echo "<table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> HTML/CSS result:" . $row["quiz3"];
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";

        echo "<table>";
        echo "<tr>";
        echo "<td> Name:" . $row["firstname"] . " " . $row["lastname"];
        echo "</td>";
        echo "<td> JavaScript result:" . $row["quiz4"];
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";

    }

    ?>

</body>

</html>