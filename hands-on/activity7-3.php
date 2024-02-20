<html >
<head>
    <title>Activity 7-3 Jan 30</title>
    <style>
        .error{color:#ff0000;}
    </style>
</head>
<body>
    <h1>Activity 7-3 Form 3</h1>
    <p>Submitted by Luis Fabela</p>

    <?php
    $Q1Err="";
    $nameErr="";
    $emailErr="";
    $commentErr="";
    $name=$email=$comment=$website="";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name =test_input($_POST["name"]);
        $email=test_input($_POST["email"]);
        $website=test_input($_POST["website"]);
        $comment=test_input($_POST["comment"]);
        
        if ($name == ""){
            $nameErr= "Name is required!";
        }
        else{
            echo "Welcome ".$name;
        }
        if ($email == ""){
            $emailErr= "Email is required!";
        }

        // if ($comment == ""){
        //     $commentErr= "Comment is required!";
        // }

        echo "<br>Your email is ".$email."<br>";
        echo "Your comment is ".$comment."<br>";


    }


    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name ="name" value="<?php echo $name;?>">  <span class="error">* <?php echo $nameErr; ?> </span><br><br>
        Email: <input type="email" name ="email" value="<?php echo $email;?>"> <span class="error">* <?php echo $emailErr;?> </span><br><br>
        Website: <input type="text" name="website" value="<?php echo $website;?>"><br><br>
        Comment: * <br><textarea name = "comment" rows="5"cols="40" value=" <?php echo $comment;?>"> </textarea><br><br>
        Gender: 
        <br>
        <input type="radio" name = "gender" value = "female">Female
        <input type="radio" name = "gender" value = "male">Male
        <input type="radio" name = "gender" value = "other">Other
        <br><br>

        <br>
        <br>
        1. what is 1+1 ? <span class ="error" >* <?php echo $Q1Err;?></span><br>
        <input type="radio" name="Q1" <?php if (isset($Q1)&&Q1=="10") echo "checked"; ?> value="10">10
        <input type="radio" name="Q1" <?php if (isset($Q1)&&Q1=="2") echo "checked"; ?> value="2">2
        <input type="radio" name="Q1" <?php if (isset($Q1)&&Q1=="3") echo "checked"; ?> value="3">3
    
        <input type="submit">
    </form>


</body>
</html>