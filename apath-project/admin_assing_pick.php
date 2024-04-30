<?php
session_start();
$id = $_SESSION["id"];

if (isset($_SESSION["id"])) {
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
    width: 10%; 
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

    <title>Admin-Assing-Volunteers-APATH</title>
    <h2>APATH-Assing-Volunteers</h2>
    <?php
    include ("admin_nabvar.php");

    ?>
</head>

<body>
    <br><br><br>
    <p>Display Volunteers Info</p>
    <br>
    <br>
    <?php

    // connect to the databse and retrive all the information from the user to the table
    include ("connection.php");
    $qs = "SELECT student.firstname, student.lastname, student.gender, student.a_date, student.a_time,
        pickup.s_id, pickup.v_id, pickup.approved, volunteer.first_name
        FROM student
        RIGHT JOIN pickup ON pickup.s_id = student.s_id
        LEFT JOIN volunteer ON pickup.v_id = volunteer.v_id
        ORDER BY student.a_date";

    $result = mysqli_query($dbc, $qs);

    echo "<table border ='1' width='80%'>";

    echo "<tr> 
            <td>To confirm/approve</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Gender</td>
            <td>Arr date</td>       
            <td>Arr time</td>
            <td>v_id</td>
            <td>already approved?</td>
            
        </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "  
                <td><a href='#' onclick='showConfirmation(\"admin_approve.php?id=".$row['s_id']."\", \"".$row['a_date']."\", \"".$row['a_time']."\" , \"".$row['firstname']."\", \"".$row['first_name']."\")'> approve </a></td>
                <td>" . $row['firstname'] . "</td>
                <td> " . $row['lastname'] . "</td>
                <td> " . $row['gender'] . "</td>  
                <td> " . $row['a_date'] . "</td>
                <td> " . $row['a_time'] . "</td>
                <td> " . $row['v_id'] . "</td>    
                <td> " . $row['approved'] . "</td>";

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
function showConfirmation(url, date, time, sName, vName) {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";

  // Customize the confirmation message with the arrival date and time
  var confirmationMessage = "Please confirm that you want to approve volunteer:" 
  + vName + " to pick up \nstudent: " +sName+ "\n on " +date+", "+time ;
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