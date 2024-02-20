
<html>
<head>
    <title>Document</title>
</head>
<body>
<h1>Activity 5</h1>
<p>Submitted by Luis Fabela</p>

<h2>Using Array</h2>

<?php
    $cars = array("BMW","Honda","McLaren",);
    // Access the array by index. 
    echo "After graduation I want to have a ".$cars[0]."<br>";
    //define array using index.
    $friends[0]="Mike";
    $friends[1]="Jeff";
    $friends[2]="Susan";
    $friends[3]="Jenny";
    $friends[4]="Josh"; // last index is size -1 \

    echo "<p>Using Loop for Array</p>";
    for ($i=0;$i<count($friends);$i++){
        echo "Friend Number ".($i+1)." is ".$friends[$i]."<br>";
    }

    echo"<p>Looping using Associative Array</p>";
    // define associate array
    $SID["Mike"] = "9001234";
    $SID["Jeff"] = "9001235";
    $SID["Susan"] = "9001236";
    $SID["Jenny"] = "9001237";
    $SID["Josh"] = "9001238";
    
    foreach($SID as $name =>$id){
        echo"Student ID of ".$name." is ".$id."<br>";
    }

    echo "<hr>";

    echo "Define another associative Array <br>";
    $salary = array ("Mike"=>400,"Jeff"=>700,"Jack"=>2000,"Jenny"=>5000,"Josh"=>2500);

    $sum=0;
    foreach($salary as $payment){
        $sum+=$payment;
    }
    echo "The total salary is ".$sum.".<br>";

    echo "Find the highest paid employee <br>";

    $topSalary=$salary["Mike"];
    $topPerson ="Mike";
    foreach($salary as $name=>$payment){
        if ($payment>$topSalary){
            $topSalary = $payment;
            $topPerson = $name;
        }
    }
    //echo $topPerson." has the highest salarym which is ".$topSalary";
     echo $topPerson." has the highest salary, which is $".$topSalary."<br>";


    echo"<hr>";
    //TODO 
    echo "Find the lowest paid employee<br>";
    $lowSalary=$salary["Josh"];
    $lowestPerson ="Josh";
    foreach($salary as $name=>$payment){
        if ($payment<$lowSalary){
            $lowSalary = $payment;
            $lowestPerson = $name;
        }
    }
    echo $lowestPerson." has the lowest salary, which is $".$lowSalary."<br>"

?>
<hr>
<h2>About 2D Array</h2>
<?php
    $students=array(
        array("Mike", 22, "male"),
        array("Jenny", 20, "female"),
        array("Josh", 18, "male"),
        array("Susan", 21, "female")
    );
    for($row=0;$row<count($students); $row++){
        echo "<p>Student No. ".($row+1)." </p>";
        echo "<ul>";
            for ($col=0;$col<count($students[$row]); $col++) {
                echo"<li> ".$students[$row][$col]."  </li>";
            }
        echo "</ul>";
    }

?>




</body>
</html>