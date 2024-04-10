<?php
session_start();
?>
<html lang="en">
<head>
    
</head>
<body>
<?php
//$_SESSION["PC"] = $_SESSION["Ipad"] = $_SESSION["Mac"]=$_POST["PC"]=$_POST["Ipad"]=$_POST["Mac"]= "";
if (isset($_POST["submit"])){

    if($_POST["PC"] == "PC"){
        $_SESSION["PC"] = "PC";
        if (isset($_SESSION["nPC"])){
            $_SESSION["nPC"] += $_POST["nPC"]; // for continue shopping, accumulate items
        }
        else{
            $_SESSION["nPC"] = $_POST["nPC"]; // for the first time shopping 
        }
    }

    // for ipad 
    if($_POST["Ipad"] == "Ipad"){
        $_SESSION["Ipad"] = "Ipad";
        if (isset($_SESSION["nIpad"])){
            $_SESSION["nIpad"] += $_POST["nIpad"]; // for continue shopping, accumulate items
        }
        else{
            $_SESSION["nIpad"] = $_POST["nIpad"]; // for the first time shopping 
        }
    }
    // for mac 
    if($_POST["Mac"] == "Mac"){
        $_SESSION["Mac"] = "Mac";
        if (isset($_SESSION["nMac"])){
            $_SESSION["nMac"] += $_POST["nMac"]; // for continue shopping, accumulate items
        }
        else{
            $_SESSION["nMac"] = $_POST["nMac"]; // for the first time shopping 
        }
    }
}

$total = 0 ; 

echo"<h1> Your shopping cart: </h1>
    <hr>
    <table>
        <tr>
            <td>Item</td>
            <td>Price</td>
            <td>Quantity</td>
        </tr>";
if ($_SESSION["PC"] == "PC"){
    // echo"to calculat etotal = price ".$_POST."";
    $total += $_POST["PCPrice"] * $_SESSION["nPC"];
    echo "<tr> <td>    <img src='".$_POST["PCImage"]."' width = '100'>    </td>";
    echo "<td>$  ".$_POST["PCPrice"]."  </td>";
    echo "<td>  ".$_SESSION["nPC"]."    </td>";
    echo "</tr>";
}
// handle Ipad
if ($_SESSION["Ipad"] == "Ipad"){
    // echo"to calculat etotal = price ".$_POST."";
    $total += $_POST["IpadPrice"] * $_SESSION["nIpad"];
    echo "<tr> <td>    <img src='".$_POST["IpadImage"]."' width = '100'>    </td>";
    echo "<td>$  ".$_POST["IpadPrice"]."  </td>";
    echo "<td>  ".$_SESSION["nIpad"]."    </td>";
    echo "</tr>";
}
// handle Mac
if ($_SESSION["Mac"] == "Mac"){
    // echo"to calculat etotal = price ".$_POST."";
    $total += $_POST["MacPrice"] * $_SESSION["nMac"];
    echo "<tr> <td>    <img src='".$_POST["MacImage"]."' width = '100'>    </td>";
    echo "<td>$  ".$_POST["MacPrice"]."  </td>";
    echo "<td>  ".$_SESSION["nMac"]."    </td>";
    echo "</tr>";
}

echo"</table>";
echo "<hr>";
echo "<h3>The total cost is ".$total." </h3>";
    $_SESSION["total_cost"]=$total;
echo "<h3>Please Verify your order and 
<a href = 'action15-2.php' >proceed to checkout</a> or <a href = 'activity15.php'>click here</a> to continue shopping</h3>";
?>


</body>
</html>