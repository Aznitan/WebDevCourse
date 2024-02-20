
<html >
<head>
    <title>Activity 6 Jan 30</title>
</head>
<body>
    <h1>Activity 6</h1>
    <p>Submitted by Luis Fabela</p>

    <h2>2D Array</h2>

    <?php
    $students = array(
            array("Mike", 22, "male"), 
            array("Jenny", 20 , "female"), 
            array("Josh",18 ,"male"), 
            array("Susan", 21, "female")
    );

    echo "Display 2D array in a table";
    echo "<table border= '1' style = 'width: 40%; margin:auto;'>";
    echo "<tr> <td>Name</td>   <td>Age</td>  <td>Gender</td></tr>";
    foreach($students as $row=>$person){
        echo"<tr>";
        foreach($person as $value){
            echo "<td>";
            echo $value;
            echo "</td>";
        }
        echo"</tr>";
    }
    echo "</table>";
    
    echo "Searching through the 2D array <br>";
    $name = "Jenny";
    foreach($students as $person){
        if ($name == $person[0]){
            echo "Name: ".$person[0];
            echo "<br>Age: ".$person[1];
            echo "<br>Gender: ".$person[2];
        }
    }
    

    $students[10]=array("Jason",22,"male"); //php is flexible with the index
    $students[11]=array("Megan",18,"female");

    echo"<br>";
    echo "<br>Searching for the youngest age<br>";

    $youngest = $students[0][1];
    foreach($students as $index=>$person){
        if ($person[1] < $youngest){
            $youngest = $person[1];
        }
    }
    echo"The youngest age is ".$youngest."<br>" ;
    // display the information of the person with the youngest age 

    foreach($students as $person){
        if ($youngest == $person[1]){
            echo "Name: ".$person[0];
            echo "<br>Age: ".$person[1];
            echo "<br>Gender: ".$person[2]."<br>";
        }
    }
    // update the array students[10] age from 21 to 22 ; and students [11] 19 to 18

    echo "<br>";
    echo "<br>Display all the students with the youngest age<br>";
    $found=0;
    foreach($students as $person){
        if ($person[1] ==$youngest){
            $found++;
            echo "Student ".$person[0]." has age ".$person[1].", and is ".$person[2]."<br>";
        }
    }

    echo "Total ".$found." student(s) has been found with age ".$youngest." <br>";

    echo "<br>Find the oldest age of the students <br>";

    $oldest = $students[0][1];
    foreach($students as $index=>$person){
        if ($person[1] > $oldest){
            $oldest = $person[1];
        }
    }
    echo"The oldest age is ".$oldest."<br>" ;


    echo "<br>Find all the male students and display their names and age<br>";
    $maleCount = 0;
    $maleStudents = "male";
    foreach($students as $person){
        if ($maleStudents == $person[2]){
            $maleCount++;
            echo "Name: ".$person[0];
            echo " Age: ".$person[1]."<br>";
        }
    }

    echo "<br>Total how many males students";
    echo "<br> Total of ".$maleCount." male student(s) has been found <br>";


    ///// keep working to this one 
    echo "<br>Find all the female students less than or equal to 20 years old";
    echo "<br>Total how many found<br>";
    $femaleYoungs = $students[0][1];
    $femaleCount = 0;
    $femaleStudents = "female";
    
    foreach($students as $person){
        if ($femaleStudents == $person[2]){
            // foreach($students as $person){
                 if ($person[1] <= 20){
                    $femaleCount++;
                     echo "Name: ".$person[0];
                     echo " Age: ".$person[1]."<br>";
                 }
             //}
            
            
        }
    }
    


    ?>
    
</body>
</html>