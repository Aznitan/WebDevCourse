<html>
<head>
    <title>Activity 2</title>
</head>

<body>
 <h1>Activity 2</h1>   
 <h2>While Loop</h2>
<?php

    $x=1;
    while($x <= 6){
        echo "The value for x is ".$x."<br>";
        $x++;
    }
    echo "The final value for x after while loop is ".$x."<br>";

    // for loop 
    echo "<h2> For Loop </h2>";
    for($x=0; $x<100; $x+=10){
        echo "The value for x is ".$x."<br>";
    }
    
    echo "The final value for x after for_loop is ".$x."<br>";

    echo "<p> The 2nd For Loop</p>";
    echo "The sume of 0+1+2+... +100 <br>";
    $sum=0;
    for($x=0; $x<=100;$x++){
        echo $x." ";
        $sum=$sum+$x;
    }
    echo "<br> The sum of 1+2+3+...+100 = ".$sum;

    echo "<h2> Nested Looping </h2>";
    for($row = 0; $row < 10; $row++){
        for($x = 0; $x < 8; $x++){
            echo "*";
        }
        echo "<br>";
    }

    echo "The 2nd Nested Looping <br>";

    for($row = 0; $row < 10; $row++){
        for($x = 0; $x < $row+1; $x++){
            echo "*";
        }
        echo "<br>";
    }

echo "The 3rd Nested Looping <br>";
      for($row = 4; $row < 10; $row++){
        for($x = 0; $x < $row+1; $x++){
            echo "*";
        }
        echo "<br>";
    }

?>
<hr>

<h2>Function</h2>
<?php
    function drawTrapeZoid($top, $bottom, $symbol){
        for ($row = $top-1; $row < $bottom ; $row++){
            for ($x=0; $x<=$row ; $x++)
                echo $symbol;
            echo "<br>";
        }

    }


    drawTrapeZoid(3,10,"^");

?>

<h2>Adding Style</h2>
<?php
    echo "<div style = ' width:50%; margin:auto; background-color:blue;text-align:center;color:red;' >";
    drawTrapeZoid(1,10,"&");
    echo "</div>";
    echo "<hr>";

    echo "<div style = ' width:50%; margin:auto; background-color:blue;text-align:center;color:red;line-height:0.8' >";
    drawTrapeZoid(1,10,"&");
    echo "</div>";
    echo "<hr>";

    echo "<div style = ' width:50%; margin:auto; background-color:blue;color:red;text-align:right' >";
    drawTrapeZoid(1,10,"&");
    echo "</div>";
    echo "<hr>";

?>

<h2>Table</h2>
<?php
    echo "<table style ='background-color:blue; color;blue; width:50%; margin:auto;' >";
        echo "<tr>";
            echo "<td>";
                echo "<div style = ' width:50%; margin:auto; background-color:blue;color:red;text-align:center' >";
                drawTrapeZoid(1,10,"*");
            echo "</td>";
            echo "<td>";
                echo "<div style = ' width:50%; margin:auto; background-color:blue;color:red;text-align:center' >";
                drawTrapeZoid(1,10,"*");
            echo "</td>";
        echo "</tr>";


        
    echo "</table>";

?>


 <p>Submitted by Luis Fabela</p>
</body>
</html>