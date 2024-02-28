<html>

<head>
    <title>Online Test - Admin Home</title>
    <style>
        p {
            align-items: center;
        }
    </style>
</head>

<body>

    <h2>Welcome to the Admin Display Page</h2>

    <?php
    include("admin_navbar.php");
    // connect to the databse and retrive all the information from the user to the table
    include("connection.php");
    $qs="SELECT * FROM users ORDER BY firstname ASC";
    $result=mysqli_query($dbc,$qs);

    echo "<table border ='1' width='75%'>";

        echo "<tr> 
                <td> Edit</td>
                <td> Delete</td>
                <td>First Name</td>
                <td>Lasst Name</td> 
                <td>Email</td>
                <td>Phone</td>
                <td>Major</td>
                <td>Gender</td>       
                <td>Password</td>
            </tr>";

    while($row=mysqli_fetch_array($result)){
        echo "<tr>";
            echo "  <td><a href='admin_edit.php?id=".$row['id']."'> edit  </a></td>
                    <td><a href='admin_delete.php?id=".$row['id']."'> delete  </a></td>
            
                    <td>".$row['firstname']."</td>
                    <td> ".$row['lastname']."</td>
                    <td> ".$row['email']."</td>
                    <td> ".$row['phone']."</td>
                    <td> ".$row['major']."</td>
                    <td> ".$row['gender']."</td>       
                    <td> ".$row['pw']."</td>";

        echo "</tr>";
    }


    echo "</table>";
    ?>







</body>

</html>