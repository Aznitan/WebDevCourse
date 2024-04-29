<?php
session_start();
$id = $_SESSION["id"];

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";
    // You might want to redirect the user to a login page or perform other actions here
}
?>
<html lang="en">

<head>

    <title>Admin-Manage-Volunteers-APATH</title>
    <h2>APATH-Manage-Volunteers</h2>
    <?php
    include ("admin_nabvar.php");

    ?>
</head>

<body>
    <br><br><br>
    <p>Display Volunteers Info</p>
    <br>
    <br>
    <?php

    // connect to the databse and retrive all the information from the user to the table
    include ("connection.php");
    $qs = "SELECT * FROM volunteer ORDER BY first_name ASC";
    $result = mysqli_query($dbc, $qs);

    echo "<table border ='1' width='80%'>";

    echo "<tr> 
            <td>V_Id</td>
            <td>Delete</td>
            <td>Last Name</td>
            <td>First Name</td>
            <td>F/M</td>
            <td>Email</td>       
            <td>Phone</td>
            <td>BK Phone</td>
            <td>PK Prov.</td>
            
        </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "  <td><a href='admin_edit.php?id=" . $row['v_id'] . "'> edit  </a></td>
                <td><a href='admin_delete.php?id=" . $row['v_id'] . "'> delete  </a></td>

                <td> " . $row['last_name'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td> " . $row['gender'] . "</td>  
                <td> " . $row['email'] . "</td>
                <td> " . $row['phone'] . "</td>
                <td> " . $row['backphone'] . "</td>    
                 
                <td> " . $row['affiliation'] . "</td>";

        echo "</tr>";
    }


    echo "</table>";


    ?>



</body>

</html>