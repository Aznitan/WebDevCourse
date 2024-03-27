<?php
$nameCookie = $pwCookie=$bkcolorCookire=$txcolorCookie="";
if (isset($_POST["submit"])) {
    echo "Set my cookies"; // for developers
    $nameCookie = $_POST["username"];
    $pwCookie = $_POST["pw"];
    $bkcolorCookire = $_POST["bkcolor"];
    $txcolorCookie = $_POST["txcolor"];

    echo "<br> user name cookie is " . $nameCookie;
    echo "<br> password cookie is " . $pwCookie;
    echo "<br> backgorund color is cookie is " . $bkcolorCookire;
    echo "<br> text color cookie is " . $txcolorCookie;

    $expire = time() + 30 * 24 * 60 * 60; // expiration to 30 days from the date set is in seconds 
    setcookie("username", $nameCookie, $expire, "/");
    setcookie("pw", $pwCookie, $expire, "/");
    setcookie("bkcolor", $bkcolorCookire, $expire, "/");
    setcookie("txcolor", $txcolorCookie, $expire, "/");
}

if(isset($_POST["clear"])){
    echo"Clear all the cookies: <br>";
    $expire = time() -20*60*60;
    setcookie("username", $nameCookie, $expire, "/");
    setcookie("pw", $pwCookie, $expire, "/");
    setcookie("bkcolor", $bkcolorCookire, $expire, "/");
    setcookie("txcolor", $txcolorCookie, $expire, "/");
}
?>


<html>

<head>
    <title>Acitivity 12 March 26</title>
    <style>
        .error {
            color: #FF0000;
        }

        body,
        ol,
        li,
        ul {
            text-align: center;
        }
    </style>
</head>

<body style ="background-color: <?php
if (isset($_COOKIE['bkcolor'])){
    echo $_COOKIE['bkcolor'];
}else{echo 'white';}
?> ; color:<?php
if (isset($_COOKIE['txcolor'])){
    echo $_COOKIE['txcolor'];
}else{echo 'black';}
?>">

    <h2>Cookies</h2>
    <p>Submited by Luis Fabela</p>
    <hr>
    <p>This activity will show you how to </p>
    <ol>
        <li>set cookies</li>
        <li>clear cookies</li>
        <li>resond to multiple buttons </li>
    </ol>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Please enter your user name : <input type="text" name="username" value="<?php
        if (isset($_COOKIE['username'])) {
            echo $_COOKIE['username'];
        }
        ?>">
        <br><br>
        Please enter your password : <input type="password" name="pw" value="<?php
        if (isset($_COOKIE['pw'])) {
            echo $_COOKIE['pw'];
        }
        ?>">
        <br><br>
        Choose your background color: <input type="color" name="bkcolor" value="<?php
        if (isset($_COOKIE['bkcolor'])) {
            echo $_COOKIE['bkcolor'];
        }else{echo 'white';}
        ?>">
        <br><br>
        Choose your text color: <input type="color" name="txcolor" value="<?php
        if (isset($_COOKIE['txcolor'])) {
            echo $_COOKIE['txcolor'];
        }else{echo 'black';}
        ?>">
        <br><br>
        <input type="submit" name="submit" value="SUBMIT">
        <br><br>
        <input type="submit" name="clear" value="Clear All Cookies">
    </form>


</body>

</html>