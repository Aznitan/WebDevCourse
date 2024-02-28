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
        echo "Something is Wrong!";
    }
}

?>