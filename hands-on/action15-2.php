<?php 
session_start();
?>


<?php 
echo "<h3>Thank you for shopping with us!</h3>";
echo"<h3>Please make a patment od $ ".$_SESSION["total_cost"]."</h3>";
// handle the transaction BUNUS POINTS 


// stop the session 
session_unset();
session_destroy();
echo "<hr>";
echo "Your Transaction is complete <a href = 'activity15.php'>click here</a> to buy moroe";

?>