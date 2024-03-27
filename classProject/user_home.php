<?php
session_start();
$id = $_SESSION["id"];
$firstname =  $_SESSION["firstname"];
if(isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";
    // You might want to redirect the user to a login page or perform other actions here
}
?>


<html>
    <head>
        <title>Online Test - User Home</title>
        <style>
            h2 {
            text-align: center;
            padding-top: 4rem;
        }

        body,ul,li,ol{
            text-align: center;
        }

        .error {
            color: #FF0000
        }
            .error {color:#FF0000}
        </style>
    </head>
    <body>
        <h2>Hello <?php echo "$firstname"  ;?>Welcome to the Free Online Testing site </h2>
        <p>You will be able to assess your web dev skils using our test bank.</p>

    <?php
    include ("user_navbar.php");
    // check DB if user already has a Profile Picture display it here allow user to update
    // if not upload/update one
    include ("connection.php");
    $qs = "SELECT * FROM users WHERE id = $id";
    $qresult = mysqli_query($dbc,$qs);
    $numrows = mysqli_num_rows($qresult);
    if ($numrows == 1 ){
        $row = mysqli_fetch_array($qresult);
        $dbpic = $row["pic"];
        //display the picture
        echo"<img src = '".$dbpic."' width='300px' alt = 'Profile Picture'>";
    }

     if(isset($_POST["submit"])){
        $tagname = "myimage";
        $filewAllowed="PNG:JPEG:JPG:GIF:BMP";
        $sizeAllowed= 10000000;// about 10MB
        $overwriteAllowed = 1;
        
        $file = uploadFile($tagname,$filewAllowed,$sizeAllowed,$overwriteAllowed);
        if ($file != false){
            echo"<br>This is your new profile Picture<br><img src='".$file."' width='300'>"; 
            // update the DB 
            $qs = "UPDATE users SET pic='".$file."' WHERE id=$id";
            mysqli_query($dbc,$qs);
             echo "<script> window.location.href='user_home.php';</script>";
        }
        else {
            echo "Uploading of the file failed. <br>";
        }
     }
     function uploadFile($tagname,$filewAllowed,$sizeAllowed,$overwriteAllowed){
        $uploadOk = 1; // 1 means i ok to upload 
        $dir = "upload/";
        $file= $dir.basename($_FILES[$tagname]["name"]); // specify where to store the files 
        $fileType = pathinfo($file,PATHINFO_EXTENSION); // return the file extension loaded
        $fileSize = $_FILES[$tagname]["size"]; //get the file size

        if ($fileSize > $sizeAllowed){
            echo "File size is too bog. Maximmun 9MB is allowed.";
            $uploadOk=0; // not good to upload
        }

        if (!stristr($filewAllowed, $fileType) ){// search substring in the 1st string to find a match 
        echo "This file is not allowed.";
        $uploadOk=0;
        }

        if (file_exists($file) && !$overwriteAllowed){
            echo "File already exist. Please upload a differetn file.";
            $uploadOk=0;
        }

        if ($uploadOk==1){
            if (!move_uploaded_file($_FILES[$tagname]["tmp_name"], $file)){
                echo"uploading failed in the proccess!";
                $uploadOk = 0;
            }
             

        }

        if ($uploadOk==1){
            return $file;
        }
        else{
            return false;
        }



    }



    ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<br>
Upload or Update your profile picture: <input type="file" name="myimage"> <br><br>
 <input type="submit" name="submit" value="SUBMIT">
</form>


<p>Feb 20, 2024</p>
<ul>
    <li>genral user: login and take the quizzes</li>
    <li>admin user: login and manage the website</li>
</ul>


To Do:
<ol>
    <li>Update our database: need to add column: user_type</li>
    <li>create admin_nav.php</li>
    <li>Create admin functions to help manage the website</li>
</ol>

<p>
    Mrach 12: User Functions <br>
    1.user login (done)
    2.user profile(done)
    3.user assessment (taking quiz)
    4.check quiz results
    Homework
    <ul>
        <li>Add columns in the users table </li>
        <li>create a php quiz form </li>
        <li>Submit form to the databse</li>
    </ul>
    1.Make all quizzes work <br>
    2.display all quizess result in admin_display

</p>

    </body>
</html>