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
<style>
  
  .modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,100); 
    background-color: rgba(0,0,100,0.2); 
  }
  
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 30%; 
  }
  
  /* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>
 
    <title>APATH-Pickup Needs</title>
    <h2>APATH-Pickup Needs</h2>
  <?php
  include("volunteernav.php");
  
  ?>
</head>
<body>
<br>
    <br>
    <p>Welcome to Atlanta,GA</p>
    <?php 

   // connect to the databse and retrive all the information from the user to the table
   include("connection.php");
   $qs="SELECT * FROM student ORDER BY a_date ASC";
   $result=mysqli_query($dbc,$qs);

   echo "<table border ='1' width='80%'>";

       echo "<tr> 
               <td>Pickup</td>
               <td>Arriving Date</td>
               <td>Arriving Time</td>
               <td>Major</td>       
               
               
           </tr>";

   while($row=mysqli_fetch_array($result)){
       echo "<tr>";
           //echo "  <td><a href='admin_edit.php?id=".$row['s_id']."'> Pickup </a></td>
           //echo "  <td><a href='#' onclick='showConfirmation(\"admin_edit.php?id=".$row['s_id']."\")'> Pickup </a></td>    
           echo "  <td><a href='#' onclick='showConfirmation(\"v_p_confirm.php?id=".$row['s_id']."\", \"".$row['a_date']."\", \"".$row['a_time']."\")'> Pickup </a></td>
                   <td> ".$row['a_date']."</td>
                   <td> ".$row['a_time']."</td>   
                   <td> ".$row['major']."</td>";

       echo "</tr>";
   }


   echo "</table>";
   
   
   ?>
  <!-- The Modal -->
<div id="myModal" class="modal">


<div class="modal-content">
    <span class="close">&times;</span>
    <p id="confirmationMessage"></p>
    <button id="confirmButton">Confirm</button>
    <button id="cancelButton">Cancel</button>
  </div>

</div>

<script>
function showConfirmation(url, date, time) {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";

  // Customize the confirmation message with the arrival date and time
  var confirmationMessage = "Please confirm that you are available on " + date + ", " + time + " to pick up a student.";
  document.getElementById("confirmationMessage").textContent = confirmationMessage;

  document.getElementById("confirmButton").onclick = function() {
    window.location.href = url;
  };
  document.getElementById("cancelButton").onclick = function() {
    modal.style.display = "none";
  };

  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
  };

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}
</script>




</body>
</html>