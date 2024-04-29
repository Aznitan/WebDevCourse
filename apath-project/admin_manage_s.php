<?php
session_start();
$id = $_SESSION["id"];

if(isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    echo "Session ID is " . $id . "<br>"; // For developers
} else {
    echo "Session ID is not set";
    // You might want to redirect the user to a login page or perform other actions here
}
?>
<html lang="en">
<head>
 
    <title>Admin-Manage-Students-APATH</title>
    <h2>APATH-Manage-Students</h2>
  <?php
  include("admin_nabvar.php");
  
  ?>
</head>
<body>
    <br><br><br>
    <p>Display Students Info</p>
    <br>
    <br> 
   <?php 

   // connect to the databse and retrive all the information from the user to the table
   include("connection.php");
   $qs="SELECT * FROM student ORDER BY firstname ASC";
   $result=mysqli_query($dbc,$qs);

   echo "<table border ='1' width='80%'>";

       echo "<tr> 
               <td>S_Id</td>
               <td> Delete</td>
               <td>Last Name</td>
               <td>First Name</td>
               <td>F/M</td>
               <td>ArrDate</td>
               <td>ArrTime</td>
               <td>FN</td>       
               <td>BigLug</td>
               <td>PK Req</td>
               <td>Spe.</td>
               
           </tr>";

   while($row=mysqli_fetch_array($result)){
       echo "<tr>";
           echo "  <td><a href='admin_edit.php?id=".$row['s_id']."'> edit  </a></td>
                   <td><a href='admin_delete.php?id=".$row['s_id']."'> delete  </a></td>

                   <td> ".$row['lastname']."</td>
                   <td>".$row['firstname']."</td>
                   <td> ".$row['gender']."</td>  
                   <td> ".$row['a_date']."</td>
                   <td> ".$row['a_time']."</td>
                   <td> ".$row['flightnum']."</td>    
                   <td> ".$row['big_luggage']."</td>
                   <td> ".$row['pickup']."</td>    
                   <td> ".$row['sattention']."</td>";

       echo "</tr>";
   }


   echo "</table>";
   
   
   ?>



</body>
</html>