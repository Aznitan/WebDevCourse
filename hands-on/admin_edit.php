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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    echo"my id inside the post methis is ".$id;
    $newfirstname= mysqli_real_escape_string($dbc,trim($_POST["firstname"]));
    $newlasstname= mysqli_real_escape_string($dbc,trim($_POST["lastname"]));
    $newemail= mysqli_real_escape_string($dbc,trim($_POST["email"]));
    $newphone= mysqli_real_escape_string($dbc,trim($_POST["phone"]));
    $newmajor= mysqli_real_escape_string($dbc,trim($_POST["major"]));
    $newpass= mysqli_real_escape_string($dbc,trim($_POST["password1"]));

    //build the query statement
    $qs="UPDATE users SET firstname='$newfirstname', lastname='$newlastname',email='$newemail',phone='$phone',
    major='$newmajor', pw='$newpass' WHERE id= $id";
    echo "Update statement is ".$qs."<br>";
    //run the query 
    mysqli_queryq($dbc, $qs);
    //1 row should be affected
    if (mysqli_affected_rows($dbc) ==1) {
        echo "You have updated the user successfully!";
    }
    else {
        echo "SOmething is Wrong!";
    }
}

?>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

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