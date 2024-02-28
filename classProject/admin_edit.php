<html>

<head>
    <title>Online Test - Admin Edit</title>
    <style>
        p {
            align-items: center;
        }
    </style>
</head>

<body>
    <h2>Welcome to the Admin Edit Page </h2>

<?php
    include("admin_navbar.php");
    $id = $_GET['id'];
    echo "id of this user is ".$id."<br>";

    // retrive user information based on the id

    include("connection.php");
    //like scanners close he DB at the end always 

    $qs = "SELECT * FROM users WHERE id=$id";
    echo "sql statement is ".$qs."<br>";
    $result = mysqli_query($dbc,$qs);
    $numrows = mysqli_num_rows($result);
    if($numrows== 1){
        $row=mysqli_fetch_array($result);    
        $firstname=$row["firstname"]; 
        $lastname=$row["lastname"]; 
        $email=$row["email"]; 
        $major=$row["major"]; 
        $phone=$row["phone"]; 
        $pass=$row["pw"];
    }   else{
        echo "Something is Wrong! ";
    }

    echo "first name is ".$firstname."<br>";

    ?>



<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> -->
<form action="edit.php" method ="post"></form>
   ID : <input type = "text" name="id" value ="<?php echo $bdid?>"> <br><br>
   First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
   Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
   Email: <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
   Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
   Major: <input type="text" name="major" value="<?php echo $major ?>"><br><br> 
   Password: <input type="password" name="password1" value="<?php echo $pass ?>"><br><br> 

   <input type="submit" name="Update" value="Update Profile">      

</form>






</body>

</html>