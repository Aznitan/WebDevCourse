<html >
<head>
    <title>Activity 8 Feb 6</title>
    <style>
        .error{color:#ff0000;}
    </style>
</head>
<body>
    <h1>Activity 8 Feb 6</h1>
    <p>Submitted by Luis Fabela</p>
    <hr>
    <h2>Connecting to Databse</h2>
    <p>Store information submited from the form to our databse</p>
    <h2>Steps </h2>
    <ul>
        <li>Go to phpmyadmin, create a new databse and a new table</li>
        <li>Create the connection.php</li>
        <li>Update the activity8.php file to include the sql part</li> 
    </ul>

    <h3>Homework: store all the information from the form </h3>
    <h3>store questions to table for the lab 3 </h3>

    <?php
    $Q1Err=$genderErr=$nameErr=$emailErr=$commentErr=$time=$gender="";
    $name=$email=$comment=$website=$time=$timeErr=$sqs="";
    $flag = 0; // no red flag , good to go to insert to DB

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name =test_input($_POST["name"]);
            $email=test_input($_POST["email"]);
            $website=test_input($_POST["website"]);
            $comment=test_input($_POST["comment"]);
            $gender=($_POST["gender"]);
            $time=($_POST["time"]);



            if ($name == ""){
                $nameErr= "Name is required!";
                $flag = 1;
            }
            else{
                echo "Welcome ".$name;
            }
            if ($email == ""){
                $emailErr= "Email is required!";
                $flag = 2;
            }
                else{
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "invalid email format";
                    $flag = 3;
                    }
                }


            if ($gender == ""){
                $genderErr= "Gender is required!";
                $flag =4;
            }

            if ($time == ""){
                $timeErr= "Time is required!";
                $flag = 5;
            }

            // if ($comment == ""){
            //     $commentErr= "Comment is required!";
            // }

            // echo "<br>Your email is ".$email."<br>";
            // echo "Your comment is ".$comment."<br>";
            // if no red flag, ready to insert into DB
            if ($flag ==0){
                include "connection.php";
                // check email to make sure is NOT in our DB table 
                $sqs = "SELECT * from registration WHERE email = '$email' ";
                $qresult = mysqli_query($dbc,$sqs);
                $num = mysqli_num_rows($qresult);
                // $num should be 0 indicating email is not in the DB 
                if ($num !=0){
                    echo "<br><h3>Email has been used! Please Try a different email</h3></br>";
                }
                else{
                    $sqs="INSERT INTO registration(name, email, website, gender) VALUES('$name','$email','$website','$gender',$time,$comment )";
                    mysqli_query($dbc, $sqs);
                    $registerd = mysqli_affected_rows($dbc);
                    echo $registerd." row is affected. <br>";
                }
            }


        }


    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    ?>

    <hr>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name ="name" value="<?php echo $name;?>">  <span class="error">* <?php echo $nameErr; ?> </span><br><br>
        Email: <input type="email" name ="email" value="<?php echo $email;?>"> <span class="error">* <?php echo $emailErr;?> </span><br><br>
        Website: <input type="text" name="website" value="<?php echo $website;?>"><br><br>
        Gender: <span class="error">*<?php echo $genderErr ?></span>
        <br>
        <input type="radio" name = "gender" <?php if(isset($gender) && $gender == "female") echo "checked" ?> value = "female">Female
        <input type="radio" name = "gender" <?php if(isset($gender) && $gender == "male") echo "checked" ?> value = "male">male
        <input type="radio" name = "gender" <?php if(isset($gender) && $gender == "other") echo "checked" ?> value = "other">other
        <br><br>
        Select your preferred time:<span  class="error">* <?php echo $timeErr?> </span>
            <select name = "time">
                <option value="AM" <?php if($time == "AM") echo "selected";?>>MWF 9am to 11am</option>
                <option value="PM" <?php if($time == "PM") echo "selected";?> >TuTh 2pm to 4pm</option>
                <option value="EV" <?php if($time == "EV") echo "selected";?> >M-F 6pm to 8pm</option>
            </select>    
            <br><br>


        Comment:  <br><textarea name = "comment" rows="5"cols="40"> <?php echo $comment;?> </textarea><br><br>

        <br>
        <br>



        1. what is 1+1 ? <span class ="error" >* <?php echo $Q1Err;?></span><br>
        <input type="radio" name="Q1" <?php if (isset($Q1)&&Q1=="10") echo "checked"; ?> value="10">10
        <input type="radio" name="Q1" <?php if (isset($Q1)&&Q1=="2") echo "checked"; ?> value="2">2
        <input type="radio" name="Q1" <?php if (isset($Q1)&&Q1=="3") echo "checked"; ?> value="3">3
            <br><br>    
        <input type="submit">
    </form>


    <hr>


    <h3>Testing Area</h3>
    <?php
    echo "for developer only <br>";
    echo "Data collected from the form: <br>";
    echo $name."<br>".$email."<br>".$website."<br>".$comment."<br>";
    echo $gender."<br>".$time."<br>";   
    echo $flag."<br>";
    echo $sqs."<br>";
    
    
    ?>




</body>
</html>