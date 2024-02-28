<html>
    <head>
        
           <link rel="stylesheet" href="style.css" type="text/css">
        
    </head>
    <body>
        <br>
        <h2>APATH</h2>
       <?php
       include("navigationbar.php");
       ?>

       <br>
       <p>
         I’m an international students that need help; 
         <br>
         also, I recommend a confirm pw field 
       </p>
        <?php
        function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $email="Email";
        $passw = "Password";
        $flag=0;
        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-container">
          <input type="email" name="email" value="<?php echo $email;?>"><span class="error">
                <br><br>
           <input type="password" name="passw" value="<?php echo $passw;?>"> <span class="error">
            <br><br>
            <input type="submit">
        </form>












    </body>
</html>