<html>
<head>
    <title>Acitivity 11 March 19</title>
    <style>
        .error{color:#FF0000;}
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Uploading Files to Server</h1>
    <p>Submited by Luis Fabela</p>

    <p>This exercice will show how to upload files to the server <br>
    the exmaple code uploaded two files at once <br>
    YOu can modify the code so user could upload one file at the time
    </p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select an image to upload: <input type = "file" name="myimage"><br><br>
        Select a PDF file to upload: <input type="file" name="mypdf"><br><br>
        <input type="submit" name="submit" value="SUBMIT">

    </form>

    <?php
    
    if(isset($_POST["submit"])){
        $tagname = "myimage";
        $filewAllowed="PNG:JPEG:JPG:GIF:BMP";
        $sizeAllowed= 10000000;// about 10MB
        $overwriteAllowed = 1;
        
        $file = uploadFile($tagname,$filewAllowed,$sizeAllowed,$overwriteAllowed);
        if ($file != false){
            echo"<img src='".$file."' width='300'>"; 
        }
        else {
            echo "Uploading of the file failed. <br>";
        }
        $tagname = "mypdf";
        $filewAllowed="PDF";
        $sizeAllowed= 10000000;// about 10MB
        $overwriteAllowed = 1;
        
        $file = uploadFile($tagname,$filewAllowed,$sizeAllowed,$overwriteAllowed);
        if ($file != false){
            echo "<br> Three different wayas to show a PDF file. <br>";
            echo "1. Using hiper link <a href=  '".$file."' target =''_blank>Click here</a> to open the PDF file<br> ";
            echo "2. Using iframe <br><br>";
            echo "<iframe height = '500' width = '500' src='".$file."'>  </iframe> <br> ";
            echo "3. Using embeded tag. <br><br>";
            echo "<embed type='application/pdf' src='".$file."' width='500' height ='500' >";
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
    
</body>
</html>