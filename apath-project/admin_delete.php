<html>

<head>
    <title>Online Test - Admin Delete</title>
    <style>
         p,h2{
                text-align: center;
                padding-top: 3rem;
            }
            body {
                text-align: center;
            }
            form {
                display: inline-block;
                text-align: center;
            }
    </style>
</head>

<body>
<h2>Welcome to the Admin Delete Page</h2>
    <p>Submited by Luis Fabela</p>
    <?php
    $id=$firstname=$lastname=$email=$bdid="";
    
    $id=$_GET["id"];
    echo"<br>User id is: ".$id."<br>";

    include("admin_navbar.php");
    
    $id = $_GET['id'];
    echo "id of this user is ".$id."<br>";

    // retrive user information based on the id

    include("connection.php");
    //like scanners close he DB at the end always 

    $qs = "SELECT * FROM student WHERE id=$id";
    echo "sql statement is ".$qs."<br>";
    $result = mysqli_query($dbc,$qs);
    $numrows = mysqli_num_rows($result);
    if($numrows== 1){
        $row=mysqli_fetch_array($result);    
        $id=$row["id"];
        $dbid =$id;
        $firstname=$row["firstname"]; 
        $lastname=$row["lastname"]; 
        $email=$row["email"]; 
    }
    else{
        echo"Something is Wronk!";
    }
    ?>



    
    <hr>
    <h4>Are you sure you want to delete this user?</h4>

    <form action="delete.php" method="post">
    ID : <input type="text" name="id" value="<?php echo $dbid ?>"> <br><br>
    First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
    Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
    <input type="submit" name="delete" value="Delete">   
    </form>
</body>

</html>